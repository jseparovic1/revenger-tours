<?php

use Illuminate\Routing\Router;

return function (Router $router) {
    $router->view('/', 'welcome');
    $router->view('/tailwind', 'tailwind');
    $router->view('/test', 'playground');
};
