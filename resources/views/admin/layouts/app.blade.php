<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Revenger tours</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
</head>

<body class="font-sans">
    <div class="mx-auto bg-grey-lightest" id="app">
        <div class="min-h-screen flex flex-col">
            @include('admin._partials.nav')
            <div class="flex flex-1">
                @include('admin._partials.sidebar')
                @yield('content')
            </div>
            <footer class="bg-black text-white p-2 flex justify-center">
                <div>&copy; Revenger Tours</div>
            </footer>
        </div>
    </div>
    @yield('javascript')
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
