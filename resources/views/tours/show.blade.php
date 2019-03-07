@php
    /** @var \App\Tour $tour */
@endphp

@extends('layouts.page', [
    'title' => $tour->title,
    'breadcrumbUrl' => route('tours.show', $tour->slug),
    'imageUrl' => optional($tour->getFirstMedia('hero_original'))->getFullUrl('hero'),
    'turnOffFixedNav' => true
])

@section('page')
    <section class="p-0 m-0 relative">
        <div class="container flex flex-col lg:flex-row">
            <section class="tour-details w-full flex-1 p-0">
                <scrool-spy class="z-30">
                    <div class="tab flex-1 py-4 hover:bg-brand hover:text-white">Itinerary</div>
                    <div class="tab flex-1 py-4 hover:bg-brand hover:text-white">Map</div>
                </scrool-spy>
                <div class="tour-content mb-4 p-4">
                    {!! $tour->details !!}
                    @include('tours._partials.price', [
                        'price' => $tour->price,
                        'priceOffSeasons' => '130'
                    ])
                    @isset($tour->itinerary)
                        @include('tours._partials.itinerary', ['itinerary' => $tour->itinerary])
                    @endisset
                    @include('tours._partials.summary', [
                        'departureTime' => $tour->departure_time,
                        'departureLocation' => $tour->departure_location,
                        'included'  => explode(',', $tour->included),
                        'excluded'  => explode(',', $tour->excluded)
                    ])
                </div>
            </section>
            <aside class="w:full lg:w-1/3 lg:-mt-32 z-10 sticky">
                @include('tours._partials.book')
                @include('tours._partials.help', [
                    'title' => 'Need help?',
                    'description' => 'If you need any help regarding trip booking feel free to contact us.'
                ])
            </aside>
        </div>
    </section>
@endsection
