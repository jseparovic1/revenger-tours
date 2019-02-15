<?php

namespace App\Providers;

use App\Services\MenuFactory;
use App\Services\ResponsiveMenuFactory;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->tag([MenuFactory::class, ResponsiveMenuFactory::class], 'menu_factory');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
