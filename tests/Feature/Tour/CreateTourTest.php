<?php

declare(strict_types=1);

namespace Tests\Feature\Tour;

use App\Tour;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Tests\TestCase;

class CreateTourTest extends TestCase
{
    use InteractsWithDatabase;

    protected function createTour($overrides = [])
    {
        $tour = factory(Tour::class)->make($overrides);

        $data = $tour->toArray();
        $data['itinerary'] = json_encode($data['itinerary']);

        return $this
            ->asAuthenticatedUser()
            ->post(route('admin.tours.store'), $data);
    }

    /** @test */
    public function tour_create_request_is_validated()
    {
        $this->createTour([
            'title' => '',
            'details' => '',
            'price' => null,
            'type' => '',
        ])->assertSessionHasErrors([
            'title', 'details', 'price', 'type',
        ]);
    }

    /** @test */
    public function tour_requires_additional_data_when_marked_as_recommended()
    {
        $this->createTour([
            'card_description' => '',
            'recommended' => 'true'
        ])->assertSessionHasErrors(['card_description']);
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
        $this->createTour($attributes = [
            'title' => 'Tour title',
            'type' => 'normal'
        ])
        ->assertRedirect(route('admin.tours.edit', ['tour' => 'tour-title']));

        $this->assertDatabaseHas('tours', $attributes);

        $this->get(route('tours.show', ['tour' => 'tour-title']))
            ->assertSee($attributes['title']);
    }
}
