<?php

use App\Tour;
use Illuminate\Routing\Router;

return function (Router $router) {
    $router->get('/', function () {
        $tours = Tour::query()
            ->where('featured', '=', true)
            ->orWhere('recommended', '=', true)
            ->get();

        $featured = $tours->filter(function (Tour $tour) {
            return $tour->featured;
        })->take(3);
        $recommended = $tours->filter(function (Tour $tour) {
            return $tour->recommended;
        })->take(3);

        $single = $featured->first();

        return response()->view('main', [
            'single' => $single,
            'featured' => $featured,
            'recommended' => $recommended
        ]);
    });

    $router->view('/tailwind', 'tailwind');
    $router->view('/test', 'playground');
};
