<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Home' }} | Revenger Tours</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container px-10 py-10 bg-white">
    <button class="px-2 py-5 mb-2 text-white font-bold tracking-wide rounded bg-brand-darkest">REVENGER</button>
    <button class="px-2 py-5 mb-2 text-white font-bold rounded bg-brand-darker">DARKER</button>
    <button class="px-2 py-5 mb-2 text-white font-bold rounded bg-brand-dark">DARK</button>
    <button class="px-2 py-5 mb-2 text-white font-bold rounded bg-brand">BRAND</button>
    <button class="px-2 py-5 mb-2 text-black rounded bg-brand-light">LIGHT</button>
    <button class="px-2 py-5 mb-2 text-black rounded bg-brand-lighter">LIGHTER</button>
    <button class="px-2 py-5 mb-2 text-black rounded bg-brand-lightest">lightest</button>

    <button class="px-2 py-5 mb-2 text-white font-bold rounded bg-grey-darkest">darkest</button>
    <button class="px-2 py-5 mb-2 text-white font-bold rounded bg-grey-darker">darker</button>
    <button class="px-2 py-5 mb-2 text-white font-bold rounded bg-grey-dark">dark</button>
    <button class="px-2 py-5 mb-2 text-white font-bold rounded bg-grey">grey</button>
    <button class="px-2 py-5 mb-2 text-black rounded bg-grey-light">light</button>
    <button class="px-2 py-5 mb-2 text-black rounded bg-grey-lighter">lighter</button>
    <button class="px-2 py-5 mb-2 text-black rounded bg-grey-lightest">lightest</button>

    <h1 class="text-green text-3xl">Hi there!</h1>
</div>

@section('javascript')
    <script src="{{ mix('js/app.js') }}"></script>
@endsection
</body>
</html>
