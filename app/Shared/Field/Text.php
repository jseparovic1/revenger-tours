<?php

declare(strict_types=1);

namespace App\Shared\Field;

class Text extends BaseField
{
    public function type(): string
    {
        return 'text';
    }
}
