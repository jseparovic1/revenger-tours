<?php

namespace App\Providers;

use App\Menu\Factory\MenuFactory;
use App\Menu\Factory\ResponsiveMenuFactory;
use Illuminate\Support\Facades\URL;
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
        if(config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        $this->app->tag([
            MenuFactory::class,
            ResponsiveMenuFactory::class,
        ], 'menu_factory');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register("\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider");
        }
    }
}
