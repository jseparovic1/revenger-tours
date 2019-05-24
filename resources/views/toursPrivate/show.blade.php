@extends('layouts.page', [
    'title' => 'Private tours from split',
    'breadcrumbUrl' => route('toursPrivate.show'),
    'imageUrl' => asset('images/static/private.jpg'),
])

@php
/** @var $tour \App\Tour */
@endphp

@section('page')
    <section>
        <div class="max-w-3xl mx-auto flex flex-col lg:flex-row">
            <main class="w-full flex-1 mb-10 mr-0 lg:mr-12 ">
                <div class="blog-content title-brand">
                    <h1>Private tour</h1>
                    <p>Your wish is our command! Being smaller or larger group, we offer you tour where you can tell us your ideas where you wanna go and with our help,
                        together we can make special tour designed to your needs. Don't hesitate to <a class="text-brand text-bold" href="{{ route('request.general.show') }}">contact</a> us.
                        We will do our best to give you the best experience and quality for reasonable price.
                    </p>
                </div>
                <div>
                    @forelse($tours as $tour)
                        <a class="flex flex-col bg-white px-4 py-4 text-black hover:text-black border hover:border-brand mb-8 relative"
                           href="{{ route('request.general.show', ['tour' => $tour->id]) }}"
                        >
                            <h3 class="text-black">{{ $tour->title }}</h3>
                            <p class="mt-2">{{ $tour->short_description }}</p>
                            <div class="mt-5 lg:absolute lg:mb-20 lg:mr-5 lg:pin-r lg:pin-b text-center">
                                <span class="btn btn-primary text-lg"><span class="text-sm">from</span> {{ $tour->price }} €</span>
                            </div>
                        </a>
                    @empty
                        <p>...</p>
                    @endforelse
                </div>
            </main>
            <aside class="w:full lg:w-1/3">
                @include('tours._partials.help')
            </aside>
        </div>
    </section>
@endsection
