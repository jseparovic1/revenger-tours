<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title or 'Home' }} | Revenger Tours</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container px-10 py-10">
            <h1 class="text-red text-3xl">Hi there!</h1>
        </div>

        @section('javascript')
            <script src="{{ mix('js/app.js') }}"></script>
        @endsection
    </body>
</html>
