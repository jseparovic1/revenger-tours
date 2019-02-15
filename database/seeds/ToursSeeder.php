<?php

use App\Tour;
use Illuminate\Database\Seeder;

class ToursSeeder extends Seeder
{
    public function run()
    {
        /** @var Tour $blueLagoon */
        $blueLagoon = factory(\App\Tour::class)->create([
            'title' => 'Blue lagoon',
        ]);

        $blueLagoon
            ->addMedia(public_path('images/header/boat.jpg'))
            ->preservingOriginal()
            ->withResponsiveImages()
            ->toMediaCollection('hero')
        ;

        /** @var Tour $blueCave */
        $blueCave = factory(\App\Tour::class)->create([
            'title' => 'Blue cave',
            'hero_short_description' => '3 islands tour',
        ]);

        $blueCave
            ->addMedia(public_path('images/header/tour.jpg'))
            ->preservingOriginal()
            ->withResponsiveImages()
            ->toMediaCollection('hero')
        ;

        /** @var Tour $blueLagoon */
        $pakleniIslands = factory(\App\Tour::class)->create([
            'title' => 'Pakleni islands',
            'hero_short_description' => 'Feel beautiful Hvar',
        ]);

        $pakleniIslands
            ->addMedia(public_path('images/header/zrak.jpg'))
            ->preservingOriginal()
            ->withResponsiveImages()
            ->toMediaCollection('hero')
        ;

        /** @var Tour $blueLagoon */
        $tour4 = factory(\App\Tour::class)->create([
            'title' => 'One more Blue lagoon',
        ]);

        $tour4
            ->addMedia(public_path('images/header/boat.jpg'))
            ->preservingOriginal()
            ->withResponsiveImages()
            ->toMediaCollection('hero')
        ;

        /** @var Tour $blueLagoon */
        $tour5 = factory(\App\Tour::class)->create([
            'title' => 'Tour 5',
        ]);

        $tour5
            ->addMedia(public_path('images/header/boat.jpg'))
            ->preservingOriginal()
            ->withResponsiveImages()
            ->toMediaCollection('hero')
        ;
    }
}
