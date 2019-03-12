<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ $title ?? 'Home' }} | Revenger Tours</title>
    @isset($description) <meta name="description" content="{{ $description }}"/>@endisset
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="font-sans font-normal antialiased text-black leading-normal text-sm md:text-base">
    <div id="app" class="flex flex-col {{ $turnOffFixedNav ?? 'overflow-x-hidden'}}">
        @if(isset($turnOffFixedNav) && $turnOffFixedNav)
            @include('partials.nav', ['fixedOff' => true])
        @else
            @include('partials.nav')
        @endif

        @yield('content')
        @include('partials.footer')
    </div>
    @yield('javascript')
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
