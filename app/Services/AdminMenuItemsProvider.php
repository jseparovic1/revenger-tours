<?php

declare(strict_types=1);

namespace App\Services;

class AdminMenuItemsProvider
{
    public function all(): array
    {
        return [
            '/admin/tours' => 'Tours',
            '/admin/posts' => 'Posts',
        ];
    }
}
