<?php

declare(strict_types=1);

namespace App\Menu\ItemsProvider;

class MenuItemsProvider
{
    public function all(): array
    {
        return [
            '/' => 'HOME',
            '/tours' => 'TOURS',
            '/tour/private' => 'PRIVATE TOURS',
            '/transfers' => 'TRANSFERS',
            '/blog' => 'BLOG',
            '/contact' => 'CONTACT',
        ];
    }
}
