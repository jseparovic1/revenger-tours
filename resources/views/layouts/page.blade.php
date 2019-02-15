@extends('layouts.app')

@section('content')
    <section class="min-h-half pt-32 bg-black flex justify-center md:justify-start"
             style="background-image: url({{ $imageUrl }}); background-position: center">
        <div class="h-full flex flex-col pb-32 ml-5 lg:ml-20 lg:ml-32">
            <div class="text-4xl text-white font-extrabold">{{ $title }}</div>
            <div class="text-2xl">
                <a href="/" class="text-white">Home</a>
                <span class="text-white font-bold">/</span>
                <a href="{{ $breadcrumbUrl }}" class="text-white">{{ $title }}</a>
            </div>
        </div>
    </section>

    @yield('page')
@endsection
