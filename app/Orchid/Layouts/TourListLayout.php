<?php

namespace App\Orchid\Layouts;

use App\Tour;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class TourListLayout extends Table
{
    /**
     * Data source.
     *
     * @var string
     */
    protected $target = 'tours';

    /**
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::set('title', 'Title'),
            TD::set('type', 'Type'),
            TD::set('price', 'Price')
                ->render(function (Tour $tour) { return  $tour->price . ' €';}),

            TD::set('Actions')
                ->render(function (Tour $tour) {
                    return Link::make('')
                        ->icon('icon-pencil')
                        ->route('platform.tour.edit', $tour);
            }),
        ];
    }
}
