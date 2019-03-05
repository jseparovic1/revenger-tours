<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Revenger tours</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
</head>

<body class="font-sans">
    <div class="mx-auto bg-grey-lightest">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</body>
</html>
