<?php

namespace App\Orchid\Screens\Examples;

use Illuminate\Support\Str;
use Orchid\Screen\Layout;
use Orchid\Screen\Repository;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;

class ExampleScreen extends Screen
{
    /**
     * Fish text for the table.
     */
    public const TEXT_EXAMPLE = 'Example text.';

    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Example screen';

    /**
     * Display header description.
     *
     * @var string
     */
    public $description = 'Sample Screen Components';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        return [
            'table'=> [
                new Repository(['id' => 100, 'name' => self::TEXT_EXAMPLE, 'price' => 10.24, 'created_at' => '01.01.2020']),
                new Repository(['id' => 200, 'name' => self::TEXT_EXAMPLE, 'price' => 65.9, 'created_at' => '01.01.2020']),
            ]
        ];
    }


    public function commandBar(): array
    {
        return [];
    }


    public function layout(): array
    {
        return [
            Layout::table('table', [
                TD::set('id', 'ID')
                    ->width('150')
                    ->render(function (Repository $model) {
                        // Please use view('path')
                        return "<img src='https://picsum.photos/450/200?random={$model->get('id')}'
                              alt='sample'
                              class='mw-100 d-block img-fluid'>
                            <span class='small text-muted mt-1 mb-0'># {$model->get('id')}</span>";
                    }),

                TD::set('name', 'Name')
                    ->width('450')
                    ->render(function (Repository $model) {
                        return Str::limit($model->get('name'), 200);
                    }),

                TD::set('price', 'Price')
                    ->render(function (Repository $model) {
                        return '$ '.number_format($model->get('price'), 2);
                    }),

                TD::set('created_at', 'Created'),
            ])
        ];
    }
}
