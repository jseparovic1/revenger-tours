<?php

declare(strict_types=1);

namespace App\Menu\Factory;

use Spatie\Menu\Laravel\Link;
use Spatie\Menu\Laravel\Menu;
use App\Dto\MenuDto;
use App\Menu\ItemsProvider\AdminMenuItemsProvider;

class AdminMenuFactory extends AbstractMenuFactory
{
    /**
     * @var AdminMenuItemsProvider
     */
    protected $itemsProvider;

    public function __construct(AdminMenuItemsProvider $itemsProvider)
    {
        $this->itemsProvider = $itemsProvider;
    }

    public function create(): MenuDto
    {
        $menu = Menu::build($this->itemsProvider->all(), function (Menu $menu, $label, $link) {
            $menu
                ->setActiveFromRequest()
                ->addClass('list-reset flex flex-col')
                ->add(
                    Link::toUrl(url($link), $label)
                        ->addClass('font-hairline hover:font-normal text-sm text-nav-item no-underline font-semibold text-white')
                        ->addParentClass('w-full h-full py-3 px-2 border-l-4 border-transparent hover:border-brand')
                )
            ;
        });

        return MenuDto::create('adminMenu', $menu);
    }
}
