<?php

declare(strict_types=1);

namespace App\Shared\Field\Text;

use App\Shared\Field\BaseField;

class Text extends BaseField
{
    public function type(): string
    {
        return 'text';
    }
}
