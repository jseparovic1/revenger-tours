<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Revenger tours</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="font-sans">
    <div class="mx-auto bg-grey-lightest">
        <div class="min-h-screen flex flex-col">
            @include('admin._partials.nav')

            <div class="flex flex-1">
                @include('admin._partials.sidebar')
                @yield('content')
                <main class="bg-white flex-1 p-3 overflow-hidden">
                    <div class="flex flex-col">
                        <!-- Card Sextion Starts Here -->
                        <div class="flex flex-1 flex-col md:flex-row lg:flex-row mx-2">
                            <div class="rounded overflow-hidden bg-white mx-2 w-full">
                                <div class="px-6 py-6">
                                    <div class="font-bold text-xl">Manage tour categories</div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table text-black">
                                        <thead class="bg-brand-darkest text-white text-normal">
                                        <tr>
                                            <th scope="col">Tour</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Updated At</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>Blue lagoon</th>
                                                <td>Feel the vibe</td>
                                                <td>100e</td>
                                                <td>3 hours ago</td>
                                                <td class="flex">
                                                    <button class="py-2 px-4 bg-black rounded-full text-white">SHOW</button>
                                                    <button class="py-2 px-4 bg-info-dark rounded-full text-white">EDIT</button>
                                                    <button class="py-2 px-4 bg-brand-darker rounded-full text-white">DELETE</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /card -->
                        </div>
                        <!-- /Cards Section Ends Here -->
                    </div>
                </main>
            </div>
            <footer class="bg-black text-white p-2 flex justify-center">
                <div>&copy; Revenger Tours</div>
            </footer>
        </div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
