@extends('layouts.app')

@section('content')
    @isset($imageUrl)
        <section class="relative page min-h-half pt-32 bg-black flex"
                 style="background-image: url({{ $imageUrl }}); background-position: center; background-size: cover">
            <div class="h-full flex flex-col pb-32 z-10 w-full max-w-3xl lg:max-w-3xl mx-auto text-center md:text-left">
                <div class="text-4xl text-white font-extrabold">{{ $title }}</div>
                <div class="hidden lg:block text-2xl ">
                    <a href="/" class="text-white">Home</a>
                    <span class="text-white font-bold">/</span>
                    <span class="text-white">{{ $title }}</span>
                </div>
            </div>
        </section>
    @else
        <section class="py-5 flex justify-center sm:justify-start">
            <div class=" text-3xl font-extrabold">{{ $title }}</div>
        </section>
    @endisset
    @yield('page')
@endsection
