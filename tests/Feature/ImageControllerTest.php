<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Constants\Disk;
use App\Services\FileNameGenerator;
use App\Tour;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class ImageControllerTest extends TestCase
{
    /** @test */
    public function it_stores_temporary_uploaded_image()
    {
        $this->mock(FileNameGenerator::class, function ($mock) {
             $mock
                ->shouldReceive('forImage')
                ->with('revenger.jpg')
                ->once()
                ->andReturn('generated_filename.jpg');
        });

        Storage::fake(Disk::TEMPORARY);

        $response = $this
            ->asAuthenticatedUser()
            ->post('admin/upload', [
                'file' => UploadedFile::fake()->image('revenger.jpg')
            ]);

        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'name',
                'originalName',
            ])
        ;

        Storage::disk(Disk::TEMPORARY)->assertExists('generated_filename.jpg');
    }

    /** @test */
    public function it_attaches_image_to_resource()
    {
        Storage::fake('public');

        factory(Tour::class)->create([
            'id' => 1,
        ]);

        $response = $this
            ->asAuthenticatedUser()
            ->post('admin/upload', [
                'resourceId' => 1,
                'resource' => Tour::class,
                'collectionName' => 'hero_original',
                'file' => UploadedFile::fake()->image('revenger.jpg')
            ]);

        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'name',
                'originalName',
            ])
        ;
    }
}
