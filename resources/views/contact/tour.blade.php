@php
    /** @var \App\Tour $tour */
    /** @var \App\Tour $selectedTour */
@endphp

@extends('layouts.page', [
    'title' => 'Tour booking',
    'breadcrumbUrl' => route('request.show'),
    'imageUrl' => asset('images/static/private.jpg'),
])

@section('page')
    <section>
        <div class="w-full md:w-2/3 mx-auto">
            <div class="w-2/3 mx-auto mb-10">
                <h1 class="py-3 text-xl text-center leading-tight heading-title">How this works?</h1>
                <p class="mb-2 leading-loose">Since we don't have automated payment system,
                    we will manually check if your date is available to avoid double booking and then send you paypal
                    invoice.
                    You should only pay <strong>deposit</strong> to reserve your trip.
                </p>
            </div>
            <div class="bg-white p-10 mb-24">
                @if(isset($people) && isset($tripDate) && isset($selectedTour))
                    <send-tour-request
                        action="{{ route('request.store') }}"
                        :tour="{{ $selectedTour }}"
                        :people-number="{{ $people }}"
                        :trip-date="'{{ $tripDate }}'"
                        :method="'{{ 'post' }}'"
                        :tours="{{ $tours }}"
                    >
                    </send-tour-request>

                @else
                    <send-tour-request
                        action="{{ route('request.store') }}"
                        :method="'{{ 'post' }}'"
                        :tours="{{ $tours }}"
                    >
                    </send-tour-request>
                @endisset
            </div>
        </div>

    </section>
@endsection
