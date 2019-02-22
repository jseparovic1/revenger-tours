@extends('layouts.app')

@section('content')
    @isset($imageUrl)
        <section class="min-h-half pt-32 bg-black flex justify-center md:justify-start"
                 style="background-image: url({{ $imageUrl }}); background-position: center">
            <div class="h-full flex flex-col pb-32 ml-5 lg:ml-20 lg:ml-32">
                <div class="text-4xl text-white font-extrabold">{{ $title }}</div>
                <div class="text-2xl">
                    <a href="/" class="text-white">Home</a>
                    <span class="text-white font-bold">/</span>
                    <span class="text-white">{{ $title }}</span>
                </div>
            </div>
        </section>
    @else
        <section class="py-5 flex justify-center text-black">
            <div class="text-3xl font-extrabold heading-title">{{ $title }}</div>
        </section>
    @endisset
    @yield('page')
@endsection
