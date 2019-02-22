@php
    /** @var \App\Tour $tour */
@endphp

@extends('layouts.page', [
    'title' => 'Tour request',
    'turnOffFixedNav' => true,
])

@section('page')
    <section class="p-0">
        <div class="w-full md:w-2/3 mx-auto">
            <div class="w-2/3 mx-auto mb-10">
                <h1 class="py-3 text-xl leading-tight">How this works?</h1>
                <p class="mb-2 leading-loose">Since we don't have automated payment system,
                    we will manually check if your date is available to avoid double booking and then send you paypal
                    invoice.
                    You should only pay <strong>deposit</strong> to reserve your trip.
                </p>
            </div>
            @isset($tour)
                <div>
                    <div style="background-image: {{ $tour->getFirstMediaUrl('card') }}"></div>
                    <div>
                        <h3>
                            {{$tour->title}}
                        </h3>
                        <p>
                            {{ $tour->hero_description }}
                        </p>
                    </div>
                </div>
            @endisset
            <div class="bg-white p-10 mb-24">
                @if(isset($people) && isset($tripDate))
                    <send-contact-request
                        action="{{ route('request.store') }}"
                        :people-number="{{ $people }}"
                        :trip-date="'{{ $tripDate }}'"
                        :method="'{{ 'post' }}'"
                    >
                    </send-contact-request>

                @else
                    <send-contact-request
                        action="{{ route('request.store') }}"
                        :method="'{{ 'post' }}'"
                    >
                    </send-contact-request>
                @endisset
            </div>
        </div>

    </section>
@endsection
