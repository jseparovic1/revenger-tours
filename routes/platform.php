<?php

declare(strict_types=1);

use App\Orchid\Screens\DashboardScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\TourEditScreen;
use App\Orchid\Screens\TourListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
$this->router->screen('/main', DashboardScreen::class)->name('platform.main');

// Users...
$this->router->screen('users/{users}/edit', UserEditScreen::class)->name('platform.systems.users.edit');
$this->router->screen('users', UserListScreen::class)->name('platform.systems.users');

// Roles...
$this->router->screen('roles/{roles}/edit', RoleEditScreen::class)->name('platform.systems.roles.edit');
$this->router->screen('roles/create', RoleEditScreen::class)->name('platform.systems.roles.create');
$this->router->screen('roles', RoleListScreen::class)->name('platform.systems.roles');

//Tours
$this->router->screen('tour/{tour?}', TourEditScreen::class)->name('platform.tour.edit');
$this->router->screen('tours', TourListScreen::class)->name('platform.tour.list');
