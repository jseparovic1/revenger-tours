@extends('layouts.app')

@section('content')
    <section class="min-h-half pt-32 bg-black flex justify-center md:justify-start"
             style="background-image: url({{ asset('images/header/omis.jpg') }}); background-size: cover;">
        <div class="h-full flex flex-col pb-32 md:pl-20">
            <div class="text-4xl text-white font-extrabold">Tours</div>
            <div class="text-2xl">
                <a href="/" class="text-white">Home</a>
                <span class="text-white font-bold">/</span>
                <a href="{{ route('tours.index') }}" class="text-white">Tours</a>
            </div>
        </div>
    </section>

    <section class="mx-auto">
        <div class="container">
            <p class="text-grey-darker font-semibold">
                Lorem ipsum dolor sit amet consectetur adipiscing elit Etiam at ipsum at ligula vestibulum sodales.
            </p>
        </div>
    </section>

    <section>
        <div class="container px-2">
            <div class="flex flex-wrap -mx-2">
                @foreach($tours as $tour)
                    <div class="w-full xl:w-1/2 px-2 flex-no-shrink mb-8">
                        <div class="h-full flex flex-col sm:flex-row justify-between hover:shadow-lg mb-10">
                            <div class="w-full flex">
                                <img class="w-full" src="{{ $tour->getFirstMedia('hero')->getUrl('card') }}"/>
                            </div>
                            <div class="w-full lg:w-5/6 flex flex-col justify-around px-5 pb-5">
                                <h1 class="text-lg font-semibold text-black mb-2">{{ $tour->title }}</h1>
                                <p class="mb-4 text-grey-darker">{{ str_limit($tour->card_description, 100, '...') }}</p>
                                <button class="btn btn-primary">SEE MORE</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
