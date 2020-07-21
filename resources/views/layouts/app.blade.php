<!doctype html>
<html lang="{{ Illuminate\Support\Str::replaceFirst('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ $title ?? 'Home' }} | Blue Lagoon Trip</title>
    @isset($description) <meta name="description" content="{{ $description }}"/>@endisset
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    @if(env('APP_ENV') !== 'local')
        @include('layouts._analytics')
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @include('layouts._favicon')
</head>
<body class="font-sans font-normal antialiased text-black leading-normal text-sm md:text-base">
    <div id="app" class="flex flex-col overflow-x-hidden">
        @include('layouts._nav')
        @yield('content')
        @include('layouts._footer')
    </div>
    @yield('javascript')
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
