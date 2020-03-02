@extends('layouts.app', [
    'description' => config('settings.main_description'),
])

@section('content')
    @include('home.slider')
    @include('home.smallScreenHero')
    @include('home.featured.tours')
    @include('home.singleFeaturedTour', [
        'title' => config('settings.main_featured_tour.title'),
        'description' => config('settings.main_featured_tour.description'),
        'callToAction' => config('settings.main_featured_tour.action'),
        'background' => asset(config('settings.main_featured_tour.background')),
    ])
    @include('home.blog')
    @include('home.why')
@endsection
