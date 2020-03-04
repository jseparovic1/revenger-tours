<?php

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Post::class, function (Faker $faker) {
    return [
        'description' => $faker->text(100),
        'content' => file_get_contents(database_path('content/post.html')),
        'title' => $faker->text(40),
        'slug' => $faker->slug(),
    ];
});
