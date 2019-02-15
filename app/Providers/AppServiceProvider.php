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
        $menu = Menu::new()
            ->addClass('hidden lg:flex list-reset')
            ->add(Link::to('/', 'HOME'))
            ->add(Link::to('/tours', 'TOURS'))
            ->add(Link::to('/tours/private', 'PRIVATE TOURS'))
            ->add(Link::to('/transfers', 'TRANSFERS'))
            ->add(Link::to('/contact', 'CONTACT'))
            ->setActiveFromRequest()
            ->applyToAll(function (Link $link) {
                $link->setActive(function (Link $item) {
                    return ltrim(app(Request::class)->path(), '/') === ltrim($item->url(), '/');
                });

                $link->addClass('px-2 xl:px-5 py-5 mx-2 text-white tracking-wide font-bold');
                $link->addParentClass('flex hover:border-brand-dark border-b-4 border-transparent');
            })
        ;

        $view->share('menu', $menu);
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
