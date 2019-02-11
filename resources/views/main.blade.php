@extends('layouts.app')

@section('content')
    @include('partials.nav')
    @include('partials.slider')
    <section class="md:hidden m-0 p-0">
        <div class="hero flex justify-center sm:justify-start">
            @include('partials.hero', [
            'title' => 'Find best tours',
            'shortDescription' => 'Feel the vibe',
            'description' => ' Sail around beautiful islands of Split',
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
    @include('partials.footer')
@endsection
