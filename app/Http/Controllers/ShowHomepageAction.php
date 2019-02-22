<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Tour;

class ShowHomepageAction
{
    public function __invoke()
    {
        $tours = Tour::where('featured', true)
            ->orWhere('recommended', true)
            ->get();

        $featured = $tours->filter(function (Tour $tour) {
            return $tour->featured;
        })->take(3);
        $recommended = $tours->filter(function (Tour $tour) {
            return $tour->recommended;
        })->take(3);

        $single = $featured->first();

        return response()->view('main', [
            'singleFeatured' => $single,
            'featured' => $featured,
            'recommended' => $recommended,
        ]);
    }
}
