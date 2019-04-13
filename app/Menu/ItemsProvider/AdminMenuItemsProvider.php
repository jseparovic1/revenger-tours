<?php

declare(strict_types=1);

namespace App\Menu\ItemsProvider;

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
