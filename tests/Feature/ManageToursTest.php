<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Tour;
use Illuminate\Http\Response;
use Tests\TestCase;

class ManageToursTest extends TestCase
{
    /** @test */
    public function it_shows_all_tours()
    {
        $tour = factory(Tour::class)->create();

        $this
            ->asAuthenticatedUser()
            ->get(route('admin.tours.index'))
            ->assertSee($tour->title)
            ->assertViewHas('tours')
            ->assertOk()
        ;
    }

    /** @test */
    public function a_user_cant_edit_tour_with_invalid_data()
    {
        $tour = factory(Tour::class)->create();

        $this
            ->asAuthenticatedUser()
            ->patch(route('admin.tours.update', ['tour' => $tour->slug]))
            ->assertSessionHasErrors([
                'title', 'details', 'price',
            ])
        ;
    }

    /** @test */
    public function a_user_can_delete_tour()
    {
        $tour = factory(Tour::class)->create();

        $this
            ->asAuthenticatedUser()
            ->delete(route('admin.tours.destroy', ['tour' => $tour->slug]))
            ->assertRedirect(route('tours.index'))
        ;
    }

    /** @test */
    public function a_guest_cant_delete_tour()
    {
        $tour = factory(Tour::class)->create();

        $this
            ->delete(route('admin.tours.destroy', ['tour' => $tour->slug]))
            ->assertStatus(Response::HTTP_UNAUTHORIZED);
        ;
    }
}
