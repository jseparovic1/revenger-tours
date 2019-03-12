<?php

use App\Http\Controllers\Admin\GetImageAction;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\UploadImageAction;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Contact\SendContactRequestAction;
use App\Http\Controllers\Contact\ShowGeneralContactFormAction;
use App\Http\Controllers\ShowHomepageAction;
use App\Http\Controllers\Tour\PrepareTourRequestAction;
use App\Http\Controllers\Tour\SendTourRequestAction;
use App\Http\Controllers\Tour\ShowPrivateTours;
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

    $router->get('/contact', ShowGeneralContactFormAction::class)->name('request.general.show');
    $router->post('/contact', SendContactRequestAction::class)->name('request.general.store');

    $router->get('/transfers', function () {return view('transfers.show');})->name('transfers.show');
    $router->get('/tour/private', ShowPrivateTours::class)->name('toursPrivate.show');

    /**
     * Admin Routes
     */
    $router->group(['middleware' => 'auth', 'prefix' => 'admin'], function (Router $router) {
        $router->post('upload',  [ImageController::class, 'store']);
        $router->get('media/{mediaId}', [ImageController::class, 'show']);
        $router->post('media/{mediaId}', [ImageController::class, 'destroy']);

        $router->resource('tours', TourController::class)
            ->names('admin.tours');
    });
};

