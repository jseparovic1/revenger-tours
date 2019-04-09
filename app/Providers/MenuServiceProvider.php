<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\Factory as View;
use App\Menu\Factory\AbstractMenuFactory;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param View $view
     * @return void
     */
    public function boot(View $view)
    {
        $menuFactories = collect($this->app->tagged('menu_factory'));

        $menuFactories->each(function (AbstractMenuFactory $menuFactory) use ($view){
            $menuDto = $menuFactory->create();
            $view->share($menuDto->menuName, $menuDto->menu);
        });
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
