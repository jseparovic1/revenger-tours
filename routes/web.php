<?php

use App\Http\Controllers\ShowHomepageAction;
use App\Http\Controllers\Tour\PrepareTourRequestAction;
use App\Http\Controllers\Tour\SendTourRequestAction;
use App\Http\Controllers\Tour\ShowTourAction;
use App\Http\Controllers\Tour\ShowTourRequestAction;
use App\Http\Controllers\Tour\ShowToursListAction;
use Illuminate\Routing\Router;

return function (Router $router) {
    $router->get('/',ShowHomepageAction::class);
    $router->get('/tours', ShowToursListAction::class)->name('tours.index');
    $router->get('/tours/{tour}', ShowTourAction::class)->name('tours.show');
    $router->get('/tour/request/prepare', PrepareTourRequestAction::class)->name('request.prepare');
    $router->get('/tour/request', ShowTourRequestAction::class)->name('request.show');
    $router->post('/tour/request', SendTourRequestAction::class)->name('request.store');


    $router->view('/tailwind', 'tailwind');
    $router->view('/test', 'playground');
};
