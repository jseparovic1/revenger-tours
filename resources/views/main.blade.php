@extends('layouts.app')

@section('content')
    @include('partials.slider')
    <section class="md:hidden m-0 p-0">
        <div class="hero flex justify-center sm:justify-start">
            @include('partials.hero', [
                'title' => $singleFeatured->title,
               'shortDescription' => $singleFeatured->hero_short_description,
               'description' => $singleFeatured->hero_description,
               'link' => route('tours.show', ['tour' => $singleFeatured->slug]),
               'callToAction' => "LET'S GO"
            ])
        </div>
    </section>
    @include('partials.featured.tours')
    @include('partials.singleFeaturedTour', [
        'title' => 'Blue cave trip',
        'description' => 'Lorem ipsum dolor sit amet consectetur adipiscing elit Etiam at ipsum at ligula',
        'callToAction' => 'INFO'
    ])
    @include('partials.why')
@endsection
