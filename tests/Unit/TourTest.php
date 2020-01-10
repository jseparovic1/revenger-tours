<?php

namespace Tests\Unit;

use App\Tour;
use Tests\TestCase;

class TourTest extends TestCase
{
    /** @test */
    public function it_shows_valid_sassoon_price()
    {
        /** @var Tour $tour */
        $tour = factory(Tour::class)->create([
            'price' => 120,
        ]);

        $this->assertEquals(120, $tour->price);
    }
}
