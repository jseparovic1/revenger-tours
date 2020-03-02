<?php

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

/** @var EloquentFactory $factory */
$factory->define(App\Tour::class, function (Faker $faker) {
    $price = $faker->numberBetween(100, 500);

    return [
        'hero_description' => 'Saling around the labryinth of pakleni ilands! Find hidden beautiful beaches and deserted lagoons',
        'title' => 'Blue cave',
        'featured' => true,
        'type' => 'normal',
        'recommended' => true,
        'short_description' => 'Saling around the labryinth of pakleni ilands! Find hidden beautiful beaches and deserted lagoons',
        'description' => file_get_contents(database_path('content/tour.html')),
        'departure_location' => 'Split, Riva',
        'departure_time' => '07:00, Every day',
        'included' => [
            ['included' => 'Boat Ride','Professional Crew'],
            ['included' => 'Drinks on Boat'],
            ['included' => 'Snorkeling Equipment'],
            ['included' => 'Warm Jacket And Blanket']
        ],
        'excluded' => [
            ['excluded' => 'Gole tete'],
            ['excluded' => 'Massage'],
        ],
        'price' => $price,
    ];
});
