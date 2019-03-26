<?php

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Post::class, function (Faker $faker) {
    return [
        'description' => $faker->text(100),
        'content' => $faker->realText(200),
        'title' => $faker->text(40),
    ];
});

$factory->afterMaking(Post::class, function(Post $post, Faker $faker) {
    $post
        ->addMediaFromUrl($faker->imageUrl())
        ->toMediaCollection(Post::COVER_COLLECTION);
});
