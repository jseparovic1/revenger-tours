<?php

declare(strict_types=1);

namespace App\Shared\Field;

class Wysiwyg extends BaseField
{
    public function type(): string
    {
        return 'wysiwyg';
    }
}
