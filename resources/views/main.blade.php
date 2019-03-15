@extends('layouts.app', [
    'description' => config('settings.main_description'),
])

@section('content')
    @include('partials.slider')
    {{--Small screen header--}}
        <section class="lg:hidden m-0 p-0">
        <div class="hero flex justify-start px-4">
            @include('partials.hero', [
                'title' => $singleFeatured->title,
               'shortDescription' => $singleFeatured->hero_short_description,
               'description' => $singleFeatured->hero_description,
               'link' => route('tours.show', ['tour' => $singleFeatured->slug]),
               'callToAction' => "LET'S GO"
            ])
        </div>
    </section>
    {{--/Small screen header--}}
    @include('partials.featured.tours')
    @include('partials.singleFeaturedTour', [
        'title' => config('settings.main_featured_tour.title'),
        'description' => config('settings.main_featured_tour.description'),
        'callToAction' => config('settings.main_featured_tour.action'),
        'background' => config('settings.main_featured_tour.background'),
    ])
    @include('partials.why')
@endsection
