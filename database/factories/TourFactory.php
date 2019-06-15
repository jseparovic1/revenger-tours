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
        'itinerary' => json_encode([
            [
                'hour' => '07:30h*',
                'description' => 'Boat guide'
            ],
            [
                'hour' => '11:30 – 15:30',
                'description' => 'Guided sightseeing'
            ],
            [
                'hour' => '20:00 – 20:30',
                'description' => 'Kući leć'
            ],
        ]),
        'details' => file_get_contents(database_path('content/tour.html')),
        'departure_location' => 'Split, Riva',
        'departure_time' => '07:00, Every day',
        'included' => 'Boat Ride,Professional Crew,Drinks on Boat,Snorkeling Equipment,Warm Jacket And Blanket,Entrance Tickets',
        'excluded' => 'Gole tete,Massage',
        'price' => $price,
    ];
});
