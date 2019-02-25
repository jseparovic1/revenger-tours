@php
    /** @var \App\Dto\ContactRequestDto $contactRequest */
@endphp

@component('mail::message')
# Hi Đoni,

You have new contact from revenger website.

@component('mail::panel')
    Subject: {{ $contactRequest->subject }}

    Email: {{ $contactRequest->email }}

    Name: {{ $contactRequest->name }}

    Message : {{ $contactRequest->message}}
@endcomponent

Good luck,<br>
{{ config('app.name') }}
@endcomponent
