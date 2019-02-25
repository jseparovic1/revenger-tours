@extends('layouts.page', [
    'title' => 'Contact',
    'breadcrumbUrl' => route('request.general.show'),
    'imageUrl' => asset('images/static/transfers.jpg'),
])

@section('page')
    <section>
        <div class="container flex flex-col lg:flex-row">
            <main class="w-full flex-1 pr-4 text-lg bg-w">
                <h1 class="text-2xl">Contact</h1>
                <div class="p-10 bg-white">
                    <send-contact-request :action="'{{ route("request.general.store")}}'">
                    </send-contact-request>
                </div>
            </main>
            <aside class="w:full lg:w-1/3">
                <h1 class="text-2xl">Other contact channels</h1>
                <div class="pt-4">
                    <h4 class="mt-2">Address</h4>
                    <span>Jonijeva 31, Split</span>

                    <h4 class="mt-2">Number</h4>
                    {{ config('settings.contact.phone') }}

                    <h4 class="mt-2">Email</h4>
                    {{ config('settings.contact.email') }}
                </div>
            </aside>
        </div>
    </section>
@endsection
