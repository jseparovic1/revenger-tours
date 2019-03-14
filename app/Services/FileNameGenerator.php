<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Str;

/**
 * Class FileNameGenerator
 * @package App\Services
 */
class FileNameGenerator
{
    /**
     * @param string $fileName
     * @return string
     */
    public function forImage(string $fileName): string
    {
        return sprintf("%s_%s", Str::uuid(), $fileName);
    }
}
