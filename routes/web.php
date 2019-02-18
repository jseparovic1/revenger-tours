<?php

use App\Tour;
use Illuminate\Http\Request;
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
            'recommended' => $recommended,
        ]);
    });

    $router->get('/tours', function () {
        $tours = Tour::query()
            ->where('type', '=', 'normal')
            ->get();

        return response()->view('tours.index', compact('tours'));
    })->name('tours.index');

    $router->get('/tours/{tour}', function (Tour $tour) {
        return response()->view('tours.show', compact('tour'));
    })->name('tours.show');

    $router->any('/request', function (Request $request) {
        dd($request->all());
    })->name('tour.request');

    $router->view('/tailwind', 'tailwind');
    $router->view('/test', 'playground');
};
