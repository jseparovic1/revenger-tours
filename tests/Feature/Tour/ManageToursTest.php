<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Tour;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use App\Constants\Disk;
use Illuminate\Http\UploadedFile;

class ManageToursTest extends TestCase
{
    use InteractsWithDatabase;

    /** @test */
    public function tour_create_request_is_validated()
    {
        $this->createTour([
            'title' => '',
            'details' => '',
            'price' => null,
            'type' => '',
        ])->assertSessionHasErrors([
            'title',
            'details',
            'price',
            'type',
        ]);
    }

    /** @test */
    public function tour_requires_additional_data_when_marked_as_featured()
    {
        $this->createTour([
            'hero_description' => '',
            'hero_short_description' => '',
            'featured' => 'true'
        ])->assertSessionHasErrors(['hero_description', 'hero_short_description']);
    }

    /** @test */
    public function a_user_can_create_tour()
    {
        $this->uploadFakeImage($image = 'revenger.jpg');

        $this->createTour($attributes = [
            'title' => 'Tour title',
            'type' => 'normal',
            'hero' => [$image]
        ])
            ->assertRedirect(route('admin.tours.edit', ['tour' => 'tour-title']));

        array_forget($attributes, 'hero');

        $this->assertDatabaseHas('tours', $attributes);
    }

    /** @test */
    public function it_shows_all_tours()
    {
        $tour = factory(Tour::class)->create();

        $this
            ->asAuthenticatedUser()
            ->get(route('admin.tours.index'))
            ->assertSee($tour->title)
            ->assertViewHas('tours')
            ->assertOk();
    }

    /** @test */
    public function a_user_can_delete_tour()
    {
        $tour = factory(Tour::class)->create();

        $this->withoutExceptionHandling();

        $this
            ->asAuthenticatedUser()
            ->delete(route('admin.tours.destroy', ['tour' => $tour->slug]))
            ->assertRedirect(route('admin.tours.index'));
    }

    /** @test */
    public function a_guest_cant_delete_tour()
    {
        $tour = factory(Tour::class)->create();

        $this
            ->delete(route('admin.tours.destroy', ['tour' => $tour->slug]))
            ->assertRedirect();
    }

    /** @test */
    public function a_user_cant_edit_tour_with_invalid_data()
    {
        $tour = factory(Tour::class)->create();

        $this
            ->asAuthenticatedUser()
            ->patch(route('admin.tours.update', ['tour' => $tour->slug]))
            ->assertSessionHasErrors([
                'title',
                'details',
                'price',
                'type',
                'short_description',
                'hero'
            ]);
    }

    /** @test */
    public function a_user_can_edit_tour_with_valid_data()
    {
        $tour = factory(Tour::class)->create();

        $this->uploadFakeImage($image = 'revenger.jpg');

        $this
            ->asAuthenticatedUser()
            ->patch(route('admin.tours.update', ['tour' => $tour->slug]), $attributes = [
                'title' => 'Edited',
                'hero' => [$image],
                'details' => 'Edited',
                'short_description' => 'Short description edited',
                'price' => '400',
                'price_off' => '300',
                'type' => 'private',
                'recommended' => '0',
                'featured' => '0',
                'departure_time' => 'Edited',
                'included' => 'Edited,Professional',
                'excluded' => 'Edited, Massage',
            ])
            ->assertSessionHas('status', 'Tour edited successfully.');

        array_forget($attributes, 'hero');

        $this->assertDatabaseHas('tours', $attributes);
    }

    protected function uploadFakeImage(string $image): void
    {
        Storage::fake(Disk::TEMPORARY);
        Storage::disk(Disk::TEMPORARY)->putFileAs(
            '',
            UploadedFile::fake()->image($image),
            $image
        );
    }

    private function createTour($overrides = [])
    {
        $tour = factory(Tour::class)->make($overrides);

        $data = $tour->toArray();
        $data['itinerary'] = json_encode($data['itinerary']);

        return $this
            ->asAuthenticatedUser()
            ->post(route('admin.tours.store'), $data);
    }
}
