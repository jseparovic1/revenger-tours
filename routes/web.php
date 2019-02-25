<?php

use App\Http\Controllers\Contact\SendContactRequestAction;
use App\Http\Controllers\ShowHomepageAction;
use App\Http\Controllers\Tour\PrepareTourRequestAction;
use App\Http\Controllers\Tour\SendTourRequestAction;
use App\Http\Controllers\Tour\ShowTourAction;
use App\Http\Controllers\Tour\ShowTourRequestAction;
use App\Http\Controllers\Tour\ShowToursListAction;
use Carbon\Carbon;
use Illuminate\Routing\Router;

return function (Router $router) {
    $router->get('/',ShowHomepageAction::class);
    $router->get('/tours', ShowToursListAction::class)->name('tours.index');
    $router->get('/tours/{tour}', ShowTourAction::class)->name('tours.show');
    $router->get('/tour/request/prepare', PrepareTourRequestAction::class)->name('request.prepare');
    $router->get('/tour/request', ShowTourRequestAction::class)->name('request.show');
    $router->post('/tour/request', SendTourRequestAction::class)->name('request.store');

    $router->view('/contact','contact.general')->name('request.general.show');
    $router->post('/contact', SendContactRequestAction::class)->name('request.general.store');

    $router->get('/transfers', function () {return view('transfers.show');})->name('transfers.show');
    $router->get('/tour/private', function () {return view('toursPrivate.show');})->name('toursPrivate.show');

    $router->view('/tailwind', 'tailwind');
    $router->get('/mail', function () {
        return new \App\Mail\TourRequested(\App\Dto\TourRequestDto::create([
            'email' => 'mate@mate.com',
            'name' => 'Mate',
            'people' => 2,
            'tour' => 1,
            'dateInput' => Carbon::now()->toDateString(),
        ]));
    });
    $router->view('/test', 'playground');
};
