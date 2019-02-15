<?php

declare(strict_types=1);

namespace App\Dto;

use Spatie\Menu\Laravel\Menu;

class MenuDto
{
    /**
     * @var string
     */
    public $menuName;

    /**
     * @var Menu
     */
    public $menu;

    public static function create(string $menuName, Menu $menu)
    {
        return new self($menuName, $menu);
    }

    public function __construct(string $menuName, Menu $menu)
    {
        $this->menuName = $menuName;
        $this->menu = $menu;
    }
}
