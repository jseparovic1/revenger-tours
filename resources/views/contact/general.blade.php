@extends('layouts.page', [
    'title' => 'Contact',
    'breadcrumbUrl' => route('request.general.show'),
    'imageUrl' => asset('images/static/transfers.jpg'),
])

@section('page')
    <section>
        <div class="max-w-3xl mx-auto flex flex-col lg:flex-row">
                <main class="flex-1 pr-4 text-lg">
                    <div class="p-6 lg:p-10 bg-white">
                        <send-contact-request
                            action='{{ route("request.general.store")}}'
                            private-tour='{{ $privateTour }}'
                        >
                        </send-contact-request>
                    </div>
                </main>
                <aside class="w-full lg:w-1/3">
                    <div class="pt-4 justify-between md:flex md:flex-row lg:flex-col">
                        @include('contact._channel', [
                            'title' => 'Make A Call',
                            'svg' => 'svg.phone',
                            'text' => config('settings.contact.email')
                        ])
                        @include('contact._channel', [
                           'title' => 'Send A Mail',
                           'svg' => 'svg.mail',
                           'text' => config('settings.contact.email')
                       ])
                        @include('contact._channel', [
                           'title' => 'Find Us',
                           'svg' => 'svg.phone',
                           'text' => config('settings.contact.phone')
                       ])
                    </div>
                </aside>
        </div>
    </section>
@endsection
