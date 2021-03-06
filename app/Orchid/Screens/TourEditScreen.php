<?php

namespace App\Orchid\Screens;

use App\Post;
use App\Tour;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Orchid\Screen\Action;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\RadioButtons;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\TinyMCE;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Layout;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class TourEditScreen extends Screen
{
    /** @var Redirector */
    private Redirector $redirector;

    public function __construct(Redirector $redirector, Request $request = null)
    {
        parent::__construct($request);

        $this->redirector = $redirector;
    }

    /** @var string */
    public $name = 'Create new tour';

    /** @var string */
    public $description = 'Tours';

    /** @var bool */
    public $exists = false;

    public function query(Tour $tour): array
    {
        $this->exists = $tour->exists;

        if ($this->exists) {
            $this->name = 'Edit tour';
        }

        $tour->load('attachment');

        return ['tour' => $tour];
    }

    /**
     * Button commands.
     *
     * @return Action[]
     */
    public function commandBar(): array
    {
        return [
            Button::make('Create tour')
                ->icon('icon-save')
                ->method('createOrUpdate')
                ->canSee(!$this->exists),

            Button::make('Update')
                ->icon('icon-note')
                ->method('createOrUpdate')
                ->canSee($this->exists),

            Button::make('Remove')
                ->icon('icon-trash')
                ->method('remove')
                ->canSee($this->exists),
        ];
    }

    /**
     * Views.
     *
     * @return Layout[]
     */
    public function layout(): array
    {
        $tour = Layout::rows(
            [
                Input::make('tour.title')
                    ->title('Title')
                    ->placeholder('Dalmatia island tour of your life')
                    ->required(),

                Input::make('tour.slug')
                    ->title('Slug')
                    ->placeholder('dalmatia-island-tour-of-your-life')
                    ->required(),

                RadioButtons::make('tour.type')
                    ->title('Select tour type')
                    ->options([
                        'normal' => 'Public tour',
                        'private' => 'Private tour',
                    ])
                    ->required(),

                Input::make('tour.price')
                    ->title('Price')
                    ->placeholder('240')
                    ->help('Price in eur. ')
                    ->required(),

                TinyMCE::make('tour.description')
                    ->help('Describe where you would go and what would you do.')
                    ->placeholder('Describe where you would go and what would you do.')
                    ->title('Full tour description.'),

                Input::make('tour.departure_location')
                    ->title('Departure location')
                    ->placeholder('Split riva. In front of Diocletian palace.')
                    ->required(),

                Input::make('tour.departure_time')
                    ->title('Departure time')
                    ->placeholder('07:30 every day.')
                    ->required(),

                Upload::make('tour.gallery')
                    ->title('Gallery')
                    ->acceptedFiles('image/*')
                    ->parallelUploads(5)
                    ->maxFiles(10)
                    ->groups('gallery'),

                Relation::make('tour.post')
                    ->fromModel(Post::class, 'title')
                    ->title('Select blog post related to this tour.'),
            ],
        );

        $settings = Layout::rows([
            Upload::make('tour.hero')
                ->help('Tour hero image is showed at the top of the page.')
                ->multiple(false)
                ->groups('hero')
                ->acceptedFiles('image/*')
                ->maxFiles(1)
                ->title('Tour hero image'),

            Input::make('tour.hero_description')
                ->title('Hero description')
                ->popover('One sentence description for main page image.')
                ->placeholder('Feel the beauty of Dalmatia with hand crafted tours.')
                ->required(),

            TextArea::make('tour.short_description')
                ->title('Short description')
                ->placeholder('Brief description for tours list page.')
                ->rows(3)
                ->maxlength(200)
                ->required(),

            Switcher::make('tour.recommended')
                ->sendTrueOrFalse()
                ->placeholder('Recommended')
                ->help('If checked this tour is shown as recommended on main page.'),

            Switcher::make('tour.featured')
                ->sendTrueOrFalse()
                ->placeholder('Featured')
                ->help('If checked this tour is shown on main slider.'),
        ]);

        return [
            Layout::tabs(['Details' => $tour, 'Settings' => $settings]),
        ];
    }

    public function createOrUpdate(Tour $tour, Request $request): RedirectResponse
    {
        $request->validate([
            'tour.title' => 'required',
            'tour.slug' => 'required',
            'tour.type' => 'required',
            'tour.price' => 'required|numeric',
            'tour.description' => 'required',

            'tour.departure_location' => 'sometimes|string',
            'tour.departure_time' => 'sometimes|string',

            'tour.short_description' => 'required|string',
            'tour.hero_description' => 'required|string',
        ]);

        $tour->fill($request->get('tour'))->save();

        $tour->attachment()->syncWithoutDetaching(
            [
                ...$request->input('tour.hero', []),
                ...$request->input('tour.gallery', [])
            ]
        );

        Alert::info('You have successfully created new tour.');

        return $this->redirector->route('platform.tour.list');
    }

    public function remove(Tour $tour): RedirectResponse
    {
        $tour->delete()
            ? Alert::info('You have successfully deleted the tour.')
            : Alert::warning('An error has occurred.');

        return $this->redirector->route('platform.tour.list');
    }
}
