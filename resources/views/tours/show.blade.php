@php
    /** @var \App\Tour $tour */
@endphp

@extends('layouts.page', [
    'title' => $tour->title,
    'breadcrumbUrl' => route('tours.show', $tour->slug),
    'imageUrl' => asset('images/header/omis.jpg'),
    'turnOffFixedNav' => true
])

@section('page')
    <section class="p-0 m-0 relative">
        <div class="container flex flex-col lg:flex-row">
            <section class="tour-details w-full flex-1 p-0">
                <scrool-spy>
                    <div class="tab flex-1 py-4 hover:bg-brand hover:text-white">Itinerary</div>
                    <div class="tab flex-1 py-4 hover:bg-brand hover:text-white">Map</div>
                </scrool-spy>
                <div class="tour-content mb-4">
                    {!! $tour->details !!}
                    @include('tours._partials.price')
                    @include('tours._partials.itinerary')
                    @include('tours._partials.summary')
                </div>
            </section>
            <aside class="w:full lg:w-1/3 lg:-mt-32">
                @include('tours._partials.book')
                @include('tours._partials.help')
            </aside>
        </div>
    </section>
@endsection
