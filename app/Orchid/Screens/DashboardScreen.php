<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use Orchid\Screen\Action;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

class DashboardScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Dashboard';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Welcome';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
        ];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [
            Link::make('Website')
                ->href('https://bluelagoontrip.com/')
                ->icon('icon-globe-alt'),
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        return [
            Layout::view('platform::partials.welcome'),
        ];
    }
}
