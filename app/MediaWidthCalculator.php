<?php

declare(strict_types=1);

namespace App;

use Illuminate\Support\Collection;
use Spatie\MediaLibrary\ResponsiveImages\WidthCalculator\FileSizeOptimizedWidthCalculator;

class MediaWidthCalculator extends FileSizeOptimizedWidthCalculator
{
    public function calculateWidthsFromFile(string $imagePath): Collection
    {
        $widths = parent::calculateWidthsFromFile($imagePath);

        return $widths->filter(function ($width) {
            return $width < 2050;
        });
    }
}
