<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Services\FileNameGenerator;
use App\Tour;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Mockery;

class ImageControllerTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();

        $fileNameGeneratorMock = Mockery::mock(FileNameGenerator::class);
        $fileNameGeneratorMock
            ->shouldReceive('forImage')
            ->with('revenger.jpg')
            ->once()
            ->andReturn('generated_filename.jpg');

        $this->instance(FileNameGenerator::class, $fileNameGeneratorMock);
    }

    /** @test */
    public function it_stores_temporary_uploaded_image()
    {
        Storage::fake('temporary');

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

        Storage::disk('temporary')->assertExists('generated_filename.jpg');
    }

    /** @test */
    public function it_attaches_image_to_resource()
    {
        factory(Tour::class)->create([
            'id' => 1,
        ]);

        $response = $this
            ->asAuthenticatedUser()
            ->post('admin/upload', [
                'resourceId' => 1,
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
