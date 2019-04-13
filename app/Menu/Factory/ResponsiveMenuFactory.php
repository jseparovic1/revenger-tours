<?php

declare(strict_types=1);

namespace App\Menu\Factory;

use Spatie\Menu\Laravel\Link;
use Spatie\Menu\Laravel\Menu;
use App\Dto\MenuDto;
use App\Menu\ItemsProvider\MenuItemsProvider;

class ResponsiveMenuFactory extends AbstractMenuFactory
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
                ->addClass('list-reset')
                ->add(
                    Link::to($link, $label)
                        ->addClass('hover:bg-brand-darkest hover:border-0')
                        ->addParentClass('list-reset')
                );
        });

        return MenuDto::create('menuResponsive', $menu);
    }
}
