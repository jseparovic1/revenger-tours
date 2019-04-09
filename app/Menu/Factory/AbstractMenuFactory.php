<?php

declare(strict_types=1);

namespace App\Menu\Factory;

use App\Dto\MenuDto;

abstract class AbstractMenuFactory
{
    abstract public function create(): MenuDto;
}
