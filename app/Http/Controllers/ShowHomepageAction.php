<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Post;
use App\Tour;

class ShowHomepageAction
{
    public function __invoke()
    {
        $tours = Tour::query()->where('featured', true)
            ->orWhere('recommended', true)
            ->get();

        $posts = Post::query()->take(3)->latest()->get();

        $featured = $tours->filter(function (Tour $tour) {
            return $tour->featured;
        })->take(3);

        $recommended = $tours->filter(function (Tour $tour) {
            return $tour->recommended;
        })->take(2);

        $single = $featured->first();

        return response()->view('home.index', [
            'singleFeatured' => $single,
            'featured' => $featured,
            'recommended' => $recommended,
            'posts' => $posts
        ]);
    }
}
