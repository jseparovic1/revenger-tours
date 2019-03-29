<?php

declare(strict_types=1);

namespace App\Shared\Resource;

abstract class Resource implements ResourceInterface
{
    public static $model = '';

    public static $displayInNavigation = true;

    public function name(): string
    {
        return class_basename(self::$model);
    }
}
