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
            ->addMedia(public_path('images/blue-lagoon/hero.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('hero_original')
        ;

        /** @var Tour $blueCave */
        $blueCave = factory(\App\Tour::class)->create([
            'title' => 'Blue cave',
            'hero_short_description' => '3 islands tour',
        ]);

        $blueCave
            ->addMedia(public_path('images/blue-cave/hero.jpg'))
            ->preservingOriginal()
            ->toMediaCollection('hero_original')
        ;
    }
}
