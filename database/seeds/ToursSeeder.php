<?php

use App\Tour;
use Illuminate\Database\Seeder;

class ToursSeeder extends Seeder
{
    public function run()
    {
        factory(Tour::class)->create([
            'title' => 'Trogir - Blue lagoon',
        ]);

        factory(Tour::class)->create([
            'title' => 'Blue cave',
        ]);

        factory(Tour::class)->create([
            'title' => 'Brac tour',
        ]);

        /**
         * Private Tours
         */
        factory(Tour::class)->create([
            'title' => 'Blue Cave private tour',
            'price' => '500',
            'type' => 'private',
            'featured' => false,
        ]);

        factory(Tour::class)->create([
            'title' => 'Hvar blue lagoon',
            'price' => '500',
            'type' => 'private',
            'featured' => false,
        ]);
    }
}
