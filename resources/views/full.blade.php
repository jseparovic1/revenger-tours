<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ $title ?? 'Home' }} | Revenger Tours</title>
    @isset($description) <meta name="description" content="{{ $description }}"/>@endisset
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @include('layouts._favicon')
    @includeIf(env('APP.ENV') === 'production', 'layouts._analytics')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        #app {
            background: url("images/static/transfers.jpg");
            background-size: cover;
        }
        #app1 {
            background: url("images/static/contact.jpg");
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="font-sans font-normal antialiased text-black leading-normal text-sm md:text-base">
    <div id="app" class="h-screen">

    </div>
    <div id="app1" class="h-screen">

    </div>
</body>
</html>
