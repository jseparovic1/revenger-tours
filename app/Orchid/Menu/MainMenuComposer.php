<?php

declare(strict_types=1);

namespace App\Orchid\Menu;

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
                    ->icon('icon-list')
                    ->route('platform.tour.list')
                    ->title('Tours')
            )
            ->add(Menu::MAIN,
                ItemMenu::label('Private tours')
                    ->icon('icon-diamond')
//                    ->route('platform.example.fields')
            )
            ->add(Menu::MAIN,
                ItemMenu::label('Transfers')
                    ->icon('icon-grid')
//                    ->route('platform.example.fields')
            )
            ->add(Menu::MAIN,
                ItemMenu::label('Posts')
                    ->icon('icon-list')
                    ->title('Other')
//                    ->route('platform.example.fields')
            )

        ;
    }
}
