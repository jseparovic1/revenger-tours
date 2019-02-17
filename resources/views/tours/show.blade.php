@php
    /** @var \App\Tour $tour */
@endphp

@extends('layouts.page', [
    'title' => $tour->title,
    'breadcrumbUrl' => route('tours.show', $tour->slug),
    'imageUrl' => asset('images/header/omis.jpg'),
])

@section('page')
    <section class="mx-auto">
        <div class="container">
            <p class="text-grey-darker font-semibold">
                Lorem ipsum dolor sit amet consectetur adipiscing elit Etiam at ipsum at ligula vestibulum sodales.
            </p>
        </div>
    </section>

    <section class="container focus:bg-grey-light">
        <div class="px-2">
            <div class="flex flex-wrap -mx-2">
            </div>
        </div>
    </section>

@endsection
