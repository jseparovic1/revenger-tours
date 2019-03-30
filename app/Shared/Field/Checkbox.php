<?php

declare(strict_types=1);

namespace App\Shared\Field;

class Checkbox extends BaseField
{
    public function type(): string
    {
        return 'checkbox';
    }
}
