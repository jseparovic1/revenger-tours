<?php

declare(strict_types=1);

namespace App\Menu\Factory;

use App\Dto\MenuDto;
use Illuminate\Http\Request;
use Spatie\Menu\Laravel\Menu;
use Spatie\Menu\Link;
use App\Menu\ItemsProvider\MenuItemsProvider;

class MenuFactory extends AbstractMenuFactory
{
    /**
     * @var MenuItemsProvider
     */
    protected $itemsProvider;

    public function __construct(MenuItemsProvider $itemsProvider)
    {
        $this->itemsProvider = $itemsProvider;
    }

    public function create(): MenuDto
    {
        $menu = Menu::build($this->itemsProvider->all(), function (Menu $menu, $label, $link) {
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

        return MenuDto::create('menu', $menu);
    }
}
