@extends('layouts.page', [
    'title' => 'Tours',
    'breadcrumbUrl' => route('tours.index'),
    'imageUrl' => asset('images/default/tour.jpg'),
])

@section('page')
    <section class="mx-auto">
        <div class="container">
            <p class="text-grey-darker font-semibold">{{ config('settings.tours_index_title') }}</p>
        </div>
    </section>

    <section class="max-w-3xl mx-auto focus:bg-grey-light">
        <div class="px-2">
            <div class="flex flex-wrap -mx-2">
                @foreach($tours as $tour)
                    <a href="{{ route('tours.show', $tour->slug) }}" class="w-full max-w-xl lg:w-1/2 px-8 flex-no-shrink mb-10 mx-auto">
                        <div class="tour h-full flex flex-col sm:flex-row justify-between shadow mb-4 lg:mb-8  overflow-hidden rounded-lg">
                            <div class="w-full flex img-zoom-wrapper">
                                <img
                                    class="h-auto w-full img-zoom"
                                    src="{{ optional($tour->getFirstMedia('hero_original'))->getUrl('card') ?? asset('images/default/card.jpg')}}"
                                />
                            </div>
                            <div class="w-full lg:w-5/6 flex flex-col justify-around px-5 pb-5">
                                <h1 class="text-lg font-bold text-black mb-2">{{ $tour->title }}</h1>
                                <p class="mb-4 text-grey-darker">{{ str_limit($tour->short_description, 100, '...') }}</p>
                                <button class="btn btn-primary rounded-full">BOOK</button>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
