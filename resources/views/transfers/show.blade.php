@extends('layouts.page', [
    'title' => 'Transfers from split',
    'breadcrumbUrl' => route('transfers.show'),
    'imageUrl' => asset('images/static/transfers.jpg'),
])

@section('page')
    <section>
        <div class="max-w-3xl mx-auto flex flex-col lg:flex-row blog-content title-brand">
            <main class="w-full flex-1 mb-10 mr-0 lg:mr-12">
                <h1 class="mt-0">Transfers</h1>
                <div>
                    <p class="pb-10">Do you need a transfer to an island? Lot of luggage?
                        No problem! We offer you transfers and pick ups from and to all croatian islands! With a water
                        taxi you will reach all Croatian islands in the fastest way! You will enyoj the ride with our
                        comfortbale and fast water taxi !
                        The price depends on the nummber of passengers and miles. The price includes fuel and skipper!
                        Contact us for more information about the price and reservation ! Your departure can be from
                        other islands!
                    </p>

                    <table class="table">
                        <thead class="border-transparent border-0">
                        <tr>
                            <th scope="col">Start</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Offseason <span class="hidden md:block">price</span></th>
                            <th scope="col">Seasson <span class="hidden md:block">price</span></th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="transition hover:bg-brand hover:text-white font-semibold">
                                <td >Split</td>
                                <td >Brač (Bol)</td>
                                <td>€260</td>
                                <td>€280</td>
                            </tr>
                            <tr class="transition hover:bg-brand hover:text-white font-semibold">
                                <td>Split</td>
                                <td>Brač (Milna)</td>
                                <td>€230</td>
                                <td>€250</td>
                            </tr>
                            <tr class="transition hover:bg-brand hover:text-white font-semibold">
                                <td>Split</td>
                                <td>Šolta</td>
                                <td>€130</td>
                                <td>€150</td>
                            </tr>
                            <tr class="transition hover:bg-brand hover:text-white font-semibold">
                                <td>Split</td>
                                <td>Trogir</td>
                                <td>€130</td>
                                <td>€150</td>
                            </tr>
                            <tr class="transition hover:bg-brand hover:text-white font-semibold">
                                <td>Split</td>
                                <td>Split (Airport)</td>
                                <td>€100</td>
                                <td>€120</td>
                            </tr>
                            <tr class="transition hover:bg-brand hover:text-white font-semibold">
                                <td>Split</td>
                                <td>Hvar (Airport)</td>
                                <td>€280</td>
                                <td>€300</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="text-grey">Those are high season prices, you may get lower price if demand is low.</p>
                </div>

            </main>
            <aside class="w:full lg:w-1/3">
                @include('tours._partials.help')
            </aside>
        </div>
    </section>
@endsection
