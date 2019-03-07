<?php

declare(strict_types=1);

namespace Tests\Feature\Tour;

use App\Tour;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;
use Tests\TestCase;

class EditTourTest extends TestCase
{
    use InteractsWithDatabase;

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
            ]);
    }

    /** @test */
    public function a_user_can_edit_tour()
    {
        $tour = factory(Tour::class)->create();

        $this
            ->asAuthenticatedUser()
            ->patch(route('admin.tours.update', ['tour' => $tour->slug]), $attributes = [
                "title" => "Edited",
                "details" => "Edited",
                "price" => "400",
                "type" => "private",
                "recommended" => "0",
                "featured" => "0",
                "departure_time" => "Edited",
                "included" => "Edited,Professional",
                "excluded" => "Edited, Massage",
            ])
            ->assertSessionHas('status', 'Tour edited successfully.')
        ;

        $this->assertDatabaseHas('tours', $attributes);
    }
}
