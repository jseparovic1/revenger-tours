@extends('layouts.app')

@section('content')
    <section class="min-h-half pt-32 bg-black flex justify-center md:justify-start"
             style="background-image: url({{ $imageUrl }}); background-size: cover;">
        <div class="h-full flex flex-col pb-32 md:pl-20">
            <div class="text-4xl text-white font-extrabold">Tours</div>
            <div class="text-2xl">
                <a href="/" class="text-white">{{ $title }}</a>
                <span class="text-white font-bold">/</span>
                <a href="{{ $breadcrumbUrl }}" class="text-white">{{ $title }}</a>
            </div>
        </div>
    </section>

    @yield('page')
@endsection
