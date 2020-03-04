@php
    /** @var \App\Tour $tour */
@endphp

@extends('layouts.page', [
    'title' => $tour->title,
    'breadcrumbUrl' => route('tours.show', $tour->slug),
    'imageUrl' => $tour->getHeroImage(),
    'description' => $tour->short_description,
])

@section('page')
    <section class="p-0 m-0 relative">
        <div class="max-w-3xl mx-auto flex flex-col lg:flex-row">
            <section class="tour-details w-full flex-1 p-0">
                <scrool-spy class="z-10">
                    <div class="tab flex-1 py-4 hover:bg-brand hover:text-white">Itinerary</div>
                    <div class="tab flex-1 py-4 hover:bg-brand hover:text-white">Map</div>
                </scrool-spy>
                <div class="tour-content mb-4 p-4">
                    {!! $tour->description !!}
                    @include('tours._partials.price', [
                        'price' => $tour->price,
                    ])

                    @include('tours._partials.summary', [
                        'departureTime' => $tour->departure_time,
                        'departureLocation' => $tour->departure_location,
                        'included'  => config('settings.tour.included'),
                        'excluded'  => config('settings.tour.excluded'),
                    ])
                    @include('tours._partials.note')
                </div>
            </section>
            <aside class="w:full lg:w-1/3 lg:-mt-32 z-10 sticky">
                @include('tours._partials.book')
                @include('tours._partials.help', [
                    'title' => config('settings.settings.help_box_tour.title'),
                    'description' => config('settings.settings.help_box_tour.description'),
                ])
            </aside>
        </div>
    </section>
@endsection
