<?php

use App\Tour;
use Illuminate\Database\Seeder;

class ToursSeeder extends Seeder
{
    public function run()
    {
        /** @var Tour $blueLagoon */
        $blueLagoon = factory(Tour::class)->create([
            'title' => 'Trogir - Blue lagoon',
        ]);

        $blueLagoon
            ->addMedia(public_path('images/blue-lagoon/hero.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('hero_original')
        ;

        /** @var Tour $blueCave */
        $blueCave = factory(Tour::class)->create([
            'title' => 'Blue cave',
        ]);

        $blueCave
            ->addMedia(public_path('images/blue-cave/hero.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('hero_original')
        ;

        /**
         * Private Tours
         */
        factory(Tour::class)->create([
            'title' => 'Blue Cave private tour',
            'price' => '800',
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
