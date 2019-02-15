<?php

declare(strict_types=1);

namespace App\Services;

use App\Dto\MenuDto;

abstract class AbstractMenuFactory
{
    /**
     * @var MenuItemsProvider
     */
    protected $itemsProvider;

    public function __construct(MenuItemsProvider $itemsProvider)
    {
        $this->itemsProvider = $itemsProvider;
    }

    abstract public function create(): MenuDto;
}
