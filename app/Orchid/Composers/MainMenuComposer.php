<?php

declare(strict_types=1);

namespace App\Orchid\Composers;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemMenu;
use Orchid\Platform\Menu;

class MainMenuComposer
{
    private Dashboard $dashboard;

    public function __construct(Dashboard $dashboard)
    {
        $this->dashboard = $dashboard;
    }

    /**
     * Registering the main menu items.
     */
    public function compose(): void
    {
        $this->dashboard->menu
            ->add(Menu::MAIN,
                ItemMenu::label('Tours')
                    ->icon('icon-boat')
                    ->route('platform.tour.list')
                    ->title('Tours')
            )
            ->add(Menu::MAIN,
                ItemMenu::label('Form controls')
                    ->icon('icon-list')
                    ->route('platform.example.fields')
            )
        ;
    }
}
