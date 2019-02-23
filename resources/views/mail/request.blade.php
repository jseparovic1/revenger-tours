@php
    /** @var \App\Dto\TourRequestDto $tourRequest */
@endphp

@component('mail::message')
# Hi Đoni,

You have new request from revenger website.

@component('mail::panel')
    Date {{ $tourRequest->date }}
    Number of people: {{ $tourRequest->people }}
    Email: {{ $tourRequest->email }}
    Comment : {{ $tourRequest->comment }}
@endcomponent

Good luck,<br>
{{ config('app.name') }}
@endcomponent
