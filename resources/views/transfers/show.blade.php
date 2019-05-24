@extends('layouts.page', [
    'title' => 'Transfers from Split',
    'breadcrumbUrl' => route('transfers.show'),
    'imageUrl' => asset('images/static/transfers.jpg'),
])

@section('page')
    <section>
        <div class="max-w-3xl mx-auto flex flex-col lg:flex-row blog-content">
            <main class="w-full flex-1 mb-10 mr-0 lg:mr-12">
                <h1 class="mt-0 text-brand">Speedboat transfers</h1>
                <div>
                    <p class="pb-10">
                        Speedboat transfers are fast and reliable option for people who wants to avoid traffic jams and slow ferry lines.
                        Our service is available 0-24 and maximum number of passenger is <span class="font-bold text-brand">7</span>.
                    </p>
                    <h3 class="text-lg">Included</h3>
                    <ul>
                        <li>speedboat with crew</li>
                        <li>safety equipment</li>
                        <li>bottled water</li>
                        <li>fuel</li>
                    </ul>

                    <h3>Pricing</h3>
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
                <div class="flex items-center">
                    <span class="flex">@include('svg.important', ['class' => 'h-5 w-5 inline-block text-brand-dark'])</span>
                    <h2 class="ml-2">Important note</h2>
                </div>
                <p>In case of bad weather we hold the right to cancel the transfer.
                    Captain is the decision maker in this case. Safety comes first!</p>
            </main>
            <aside class="w:full lg:w-1/3">
                @include('tours._partials.help')
            </aside>
        </div>
    </section>
@endsection
