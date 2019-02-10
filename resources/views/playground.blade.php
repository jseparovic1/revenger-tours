<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Home' }} | Revenger Tours</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <style>
        .img {
            transition: all 5s;
        }

        @keyframes zoom {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.3);
            }
            100% {
                transform: scale(1.6);
            }
        }

        #cover {
            background: url("/images/header/zrak.jpg") no-repeat center center fixed;
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="font-sans font-normal antialiased text-black leading-normal overflow-x-hidden text-sm md:text-base lg:text-lg">
<div id="app">
    <div class="h-screen w-screen overflow-x-hidden overflow-y-hidden bg-brand">
        <div id="cover" class="h-full w-auto">
    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
<script>

</script>
</body>
</html>
