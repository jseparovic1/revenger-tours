<?php

namespace App\Providers;

use Illuminate\Contracts\View\Factory as View;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Spatie\Menu\Laravel\Link;
use Spatie\Menu\Laravel\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @param View $view
     * @return void
     */
    public function boot(View $view)
    {
        $menuItems = [
            '/' => 'HOME',
            '/tours' => 'TOURS',
            '/tours/private' => 'PRIVATE TOURS',
            '/transfers' => 'TRANSFERS',
            '/contact' => 'CONTACT',
        ];

        $menu = Menu::build($menuItems, function (Menu $menu, $label, $link) {
            $menu
                ->addClass('hidden lg:flex list-reset')
                ->add(
                    Link::to($link, $label)
                        ->addClass('px-2 xl:px-5 py-5 mx-2 text-white tracking-wide font-bold')
                        ->addParentClass('flex hover:border-brand-dark border-b-4 border-transparent')
                        ->setActive(function (Link $item) {
                            return ltrim(app(Request::class)->path(), '/') === ltrim($item->url(), '/');
                        })
                );
        });

        $menuResponsive = Menu::build($menuItems, function (Menu $menu, $label, $link) {
            $menu
                ->addClass('list-reset')
                ->add(
                    Link::to($link, $label)
                        ->addClass('hover:bg-brand-darkest hover:border-0')
                        ->addParentClass('list-reset')
                );
        });

        $view->share('menu', $menu);
        $view->share('menuResponsive', $menuResponsive);
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
