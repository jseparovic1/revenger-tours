<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Home' }} | Revenger Tours</title>

    <!-- Fonts -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        .widthSet {
            max-width: 64px;
        }

        .heightSet {
            max-height: 64px;
        }
    </style>
</head>
<body class="font-sans">
<section class="container p-10">
    <button class="px-2 py-5 mb-2 text-white font-bold tracking-wide rounded bg-brand-darkest">REVENGER</button>
    <button class="px-2 py-5 mb-2 text-white font-bold rounded bg-brand-darker">DARKER</button>
    <button class="px-2 py-5 mb-2 text-white font-bold rounded bg-brand-dark">DARK</button>
    <button class="px-2 py-5 mb-2 text-white font-bold rounded bg-brand">BRAND</button>
    <button class="px-2 py-5 mb-2 text-black rounded bg-brand-light">LIGHT</button>
    <button class="px-2 py-5 mb-2 text-black rounded bg-brand-lighter">LIGHTER</button>
    <button class="px-2 py-5 mb-2 text-black rounded bg-brand-lightest">lightest</button>
    <br/>
    <button class="px-2 py-5 mb-2 text-white font-bold rounded bg-grey-darkest">darkest</button>
    <button class="px-2 py-5 mb-2 text-white font-bold rounded bg-grey-darker">darker</button>
    <button class="px-2 py-5 mb-2 text-white font-bold rounded bg-grey-dark">dark</button>
    <button class="px-2 py-5 mb-2 text-white font-bold rounded bg-grey">grey</button>
    <button class="px-2 py-5 mb-2 text-black rounded bg-grey-light">light</button>
    <button class="px-2 py-5 mb-2 text-black rounded bg-grey-lighter">lighter</button>
    <button class="px-2 py-5 mb-2 text-black rounded bg-grey-lightest">lightest</button>
    <br/>
    <button class="px-2 py-5 mb-2 text-white font-bold rounded bg-bg">bg</button>
    <button class="px-2 py-5 mb-2 text-black rounded bg-info-light">info</button>
    <button class="px-2 py-5 mb-2 text-black rounded bg-info-info">info</button>
    <br/>

    <button class="px-2 py-5 mb-2 text-black rounded bg-info-dark">info</button>
    <button class="px-2 py-5 mb-2 text-black rounded bg-warning-light">warning</button>
    <button class="px-2 py-5 mb-2 text-black rounded bg-warning">warning</button>
    <button class="px-2 py-5 mb-2 text-black rounded bg-warning-dark">warning</button>
    <br/>

    <button class="px-2 py-5 mb-2 text-black rounded bg-success-light">success</button>
    <button class="px-2 py-5 mb-2 text-black rounded bg-success">success</button>
    <button class="px-2 py-5 mb-2 text-black rounded bg-success-dark">success</button>

    <br/>
    <button class="px-2 py-5 mb-2 text-black rounded bg-danger-light">danger</button>
    <button class="px-2 py-5 mb-2 text-black rounded bg-danger">danger</button>
    <button class="px-2 py-5 mb-2 text-black rounded bg-danger-dark">danger</button>

</section>
<section class="container p-10">
    <h1 class="text-6xl">This is text 6xl</h1>
    <h1 class="text-5xl">This is text 5xl</h1>
    <h1 class="text-4xl">This is text 4xl</h1>
    <h1 class="text-3xl">This is text 3xl</h1>
    <h1 class="text-2xl">This is text 2xl</h1>
    <h1 class="text-xl">This is text xl</h1>
    <h1 class="text-lg">This is text 6xl</h1>
    <h1 class="text-base">This is text base</h1>
    <h1 class="text-sm">This is text small</h1>
    <h1 class="text-xs">This is text xs</h1>
</section>

<section class="container p-10">
    <h1 class="text-4xl font-hairline">This is text hairline</h1>
    <h1 class="text-4xl font-thin">This is text thin</h1>
    <h1 class="text-4xl font-light">This is text light</h1>
    <h1 class="text-4xl font-normal">This is text normal</h1>
    <h1 class="text-4xl font-medium">This is text mediume</h1>
    <h1 class="text-4xl font-semibold">This is text semibold</h1>
    <h1 class="text-4xl font-bold">This is text bold</h1>
    <h1 class="text-4xl font-extrabold">This is text extrabold</h1>
</section>

<section class="container p-10">
    <h1 class="text-4xl font-normal tracking-tight">This is tracking tight</h1>
    <h1 class="text-4xl font-normal tracking-normal">This is tracking normal</h1>
    <h1 class="text-4xl font-normal tracking-wide">This is tracking wide</h1>
</section>

<section class="container p-10">
    <div class="text-4xl font-normal border border-0 rounded-sm m-2">This is rounded sm</div>
    <div class="text-4xl font-normal border border-2 rounded-lg m-2">This is rounded LG</div>
    <div class="text-4xl font-normal border border-4 rounded m-2">This is rounded DEFAuLT</div>
    <div class="text-4xl font-normal border border-8 rounded-full m-2">This is rounded full</div>
</section>

<section class="container p-10">
    <div class="pb-1 border">Padding 1</div>
    <div class="pb-2 border">Padding 2</div>
    <div class="pb-3 border">Padding 3</div>
    <div class="pb-4 border">Padding 4</div>
    <div class="pb-5 border">Padding 5</div>
    <div class="pb-6 border">Padding 6</div>
    <div class="pb-8 border">Padding 8</div>
    <div class="pb-10 border">Padding 10</div>
    <div class="pb-12 border">Padding 12</div>
    <div class="pb-16 border">Padding 16</div>
    <div class="pb-20 border">Padding 20</div>
    <div class="pb-24 border">Padding 24</div>
    <div class="pb-32 border">Padding 32</div>
</section>

<section class="container p-10">
    <div class="m-8 p-6 shadow">SHADOW default</div>
    <div class="m-8 p-6 shadow-md">SHADOW md</div>
    <div class="m-8 p-6 shadow-lg">SHADOW lg</div>
    <div class="m-8 p-6 shadow-inner">SHADOW inner</div>
    <div class="m-8 p-6 shadow-outline">SHADOW outline</div>
</section>

<section class="container p-10">
    <div class="m-8 p-6 bg-brand-darkest opacity-0">OPACITY 0</div>
    <div class="m-8 p-6 bg-brand-darkest opacity-25">OPACITY 25</div>
    <div class="m-8 p-6 bg-brand-darkest opacity-50">OPACITY 50</div>
    <div class="m-8 p-6 bg-brand-darkest opacity-75">OPACITY 75</div>
    <div class="m-8 p-6 bg-brand-darkest opacity-100">OPACITY 100</div>
</section>

@section('javascript')
    <script src="{{ mix('js/app.js') }}"></script>
@endsection
</body>
</html>
