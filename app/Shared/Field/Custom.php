<?php

declare(strict_types=1);

namespace App\Shared\Field;

class Custom extends BaseField
{
    public function type(): string
    {
        return 'custom';
    }
}
