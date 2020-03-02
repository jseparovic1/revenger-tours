<footer class="w-full bg-black mx-auto">
    <section class="max-w-3xl mx-auto text-grey">
        <div class="sm:flex mb-4 justify-between">
            <div class="sm:w-1/3 sm:mt-0 mt-8 h-auto mb-5">
                <div class="mb-2">
                    <span class="text-brand font-bold text-xl">Blue Lagoon</span>
                    <span class="text-white font-bold text-xl">Trip</span>
                </div>
                <p class="text-white">{{ config('settings.footer.description') }}</p>
                <div class="mt-4 flex">
                    <a>@include('svg.fb', ['class' => 'h-6 w-6 text-white hover:text-brand-light'])</a>
                </div>
            </div>

            <div class="sm:w-1/4 h-auto mb-5">
                <div class="text-white font-bold mb-2 text-lg">Contact</div>
                <ul class="list-reset leading-normal">
                    <li class="flex items-center py-1">
                        @include('svg.mail', ['class' => 'h-6 w-6 text-brand'])
                        <span class="ml-2">{{ config('settings.contact.email') }}</span>
                    </li>
                    <li class="py-1">
                        @include('svg.phone', ['class' => 'h-6 w-6 text-brand'])
                        <span class="ml-2">{{ config('settings.contact.phone') }}</span>
                    </li>
                </ul>
            </div>
            <div class="sm:w-1/4 h-auto mb-5">
                <div class="text-white font-bold mb-2 text-lg">Quick links</div>
                <ul class="list-reset leading-normal">
                    <li class="py-1"><a href="{{ route('tours.index') }}" class="link-reset text-white flex py-1">Tours</a></li>
                    <li class="py-1"><a href="{{ route('toursPrivate.show') }}" class="link-reset text-white flex py-1">Private Tours</a></li>
                    <li class="py-1"><a href="{{ route('transfers.show') }}" class="link-reset text-white flex py-1">Boat transfers</a></li>
                    <li class="py-1"><a href="{{ route('request.general.show') }}" class="link-reset text-white flex py-1">Contact</a></li>
                </ul>
            </div>
        </div>
    </section>
</footer>
