<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Home' }} | Revenger Tours</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,700" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @php
        $tour = \App\Tour::first()->get()->first();
    @endphp
    <h1>{{ $tour->title }}</h1>
    {{ $tour->getFirstMedia('hero') }}
</div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
