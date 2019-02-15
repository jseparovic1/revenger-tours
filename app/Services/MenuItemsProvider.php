<?php

declare(strict_types=1);

namespace App\Services;

class MenuItemsProvider
{
    public function all(): array
    {
        return [
            '/' => 'HOME',
            '/tours' => 'TOURS',
            '/tours/private' => 'PRIVATE TOURS',
            '/transfers' => 'TRANSFERS',
            '/contact' => 'CONTACT',
        ];
    }
}
