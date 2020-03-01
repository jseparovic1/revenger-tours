<?php

namespace App\Orchid\Screens;

use App\Orchid\Layouts\TourListLayout;
use App\Tour;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;

class TourListScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Tours';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'All tours';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'tours' => Tour::query()
                ->orderBy('created_at')
                ->paginate()
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
            Link::make('Create new')
                ->icon('icon-add')
                ->route('platform.tour.edit')
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
            TourListLayout::class
        ];
    }
}
