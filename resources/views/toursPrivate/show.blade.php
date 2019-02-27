@extends('layouts.page', [
    'title' => 'Private tours from split',
    'breadcrumbUrl' => route('toursPrivate.show'),
    'imageUrl' => asset('images/static/private.jpg'),
])

@section('page')
    <section>
        <div class="container flex flex-col lg:flex-row">
            <main class="w-full flex-1 mb-10 pr-4 tour-content">
                <h1>Private tour</h1>
                <p>We offer you private tours to any destination on the beautiful Adriatic coast. If you are a bigger or smaller group and you want to enyoj the islands by yourself, witouth other passengers, just contact us. Tell us which islands you want to visit, or let us organize and recommend you a day trip, to your needs and budget.</p>
                <p>During the tour our professional team will take care of you, to make your holidays unforgettable. Exploring the natural beauty of islands like Hvar, Brac, Pakleni islands or Vis will create magical moments for you! We promise you best quality for the best price!
                <a class="text-brand text-bold" href="{{ route('request.general.show') }}">Contact us!</a></p>
            </main>
            <aside class="w:full lg:w-1/3">
                @include('tours._partials.help')
            </aside>
        </div>
    </section>
@endsection