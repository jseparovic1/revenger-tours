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
            <main class="w-full flex-1 mb-10 pr-4 ">
                <div class="tour-content">
                    <h1>Private tour</h1>
                    <p>We offer you private tours to any destination on the beautiful Adriatic coast. If you are a bigger or smaller group and you want to enyoj the islands by yourself, witouth other passengers, just contact us. Tell us which islands you want to visit, or let us organize and recommend you a day trip, to your needs and budget.</p>
                    <p>During the tour our professional team will take care of you, to make your holidays unforgettable. Exploring the natural beauty of islands like Hvar, Brac, Pakleni islands or Vis will create magical moments for you! We promise you best quality for the best price!
                    <a class="text-brand text-bold" href="{{ route('request.general.show') }}">Contact us!</a></p>
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
