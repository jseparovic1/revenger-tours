<?php

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

/** @var EloquentFactory $factory */
$factory->define(App\Tour::class, function (Faker $faker) {
    return [
        'hero_short_description' => 'Feel the vibe',
        'hero_description' => 'Saling around the labryinth of pakleni ilands! Find hidden beautiful beaches and deserted lagoons',
        'title' => 'Blue cave',
        'featured' => true,
        'recommended' => true,
        'card_description' => 'Saling around the labryinth of pakleni ilands! Find hidden beautiful beaches and deserted lagoons',
    ];
});
