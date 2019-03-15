@extends('layouts.page', [
    'title' => 'Transfers from split',
    'breadcrumbUrl' => route('transfers.show'),
    'imageUrl' => asset('images/static/transfers.jpg'),
])

@section('page')
    <section>
        <div class="max-w-3xl mx-auto flex flex-col lg:flex-row tour-content">
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
                            <th scope="col">Price</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="hover:text-white hover:bg-brand font-semibold">
                                <td>Split</td>
                                <td>Trogir (Airport)</td>
                                <td class="text-brand-darkest font-bold">180€</td>
                            </tr>
                            <tr class="hover:text-white hover:bg-brand font-semibold">
                                <td>Split</td>
                                <td>Brač</td>
                                <td class="text-brand-darkest font-bold">350€</td>
                            </tr>
                            <tr class="hover:text-white hover:bg-brand font-semibold">
                                <td>Split</td>
                                <td>Hvar</td>
                                <td class="text-brand-darkest font-bold">400€</td>
                            </tr>
                            <tr class="hover:text-white hover:bg-brand font-semibold">
                                <td>Split</td>
                                <td>Vis</td>
                                <td class="text-brand-darkest font-bold">550€</td>
                            </tr>
                            <tr class="hover:text-white hover:bg-brand font-semibold">
                                <td>Split</td>
                                <td>Korčula</td>
                                <td class="text-brand-darkest font-bold">950€</td>
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
