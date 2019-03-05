<?php

use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Auth\LoginController;
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
    /**
     * Auth
     */
    $router->get('login', [LoginController::class, 'showLoginForm'])->name('auth.login');
    $router->post('login', [LoginController::class, 'login'])->name('auth.login');
    $router->post('logout', [LoginController::class, 'logout'])->name('auth.logout');

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

    /**
     * Admin Routes
     */
    $router->group(['middleware' => 'auth', 'prefix' => 'admin'], function (Router $router) {
        $router->resource('tours', TourController::class)->names('admin.tours');
    });
};

