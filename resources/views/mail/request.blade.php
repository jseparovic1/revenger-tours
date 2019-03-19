@php
    /** @var \App\Dto\TourRequestDto $tourRequest */
@endphp

@component('mail::message')
# Hi Đoni,

You have new request from revenger website.

@component('mail::panel')
    Tour date {{ $tourRequest->date->format('d.m.Y') }}

    Number of people: {{ $tourRequest->people }}
    Price per person: {{ $tourRequest->tour->priceNow() }} EUR

    Email: {{ $tourRequest->email }}

    Comment : {{ $tourRequest->comment ?? 'No additional comments'}}
@endcomponent

Good luck,<br>
{{ config('app.name') }}
@endcomponent
