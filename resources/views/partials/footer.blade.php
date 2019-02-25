<footer class="w-full bg-black mx-auto">
    <section class="container text-grey">
        <div class="sm:flex mb-4 justify-between">
            <div class="sm:w-1/3 sm:mt-0 mt-8 h-auto mb-5">
                <div class="mb-2">
                    <span class="text-brand font-bold text-lg">Revenger</span>
                    <span class="text-white font-bold text-lg">Tours</span>
                </div>
                <p class="text-white">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis laoreet, neque ac pharetra porta, dui ligula volutpat enim, et tempus libero mauris et nulla. Maecenas sit amet nisi eu risus viverra rhoncus ut et massa. </p>
                <div class="mt-4 flex">
                    <a>@include('svg.fb', ['class' => 'h-6 w-6 text-white hover:text-brand-light'])</a>
                </div>
            </div>
            <div class="sm:w-1/4 h-auto mb-5">
                <div class="text-white font-bold mb-2 text-lg">Quick links</div>
                <ul class="list-reset leading-normal">
                    <li class=""><a href="{{ route('tours.index') }}" class="link-reset text-white">Tours</a></li>
                    <li class=""><a href="{{ route('toursPrivate.show') }}" class="link-reset text-white">Private Tours</a></li>
                    <li class=""><a href="{{ route('transfers.show') }}" class="link-reset text-white">Boat transfers</a></li>
                    <li class=""><a href="{{ route('request.general.show') }}" class="link-reset text-white">Contact</a></li>
                </ul>
            </div>
            <div class="sm:w-1/4 h-auto mb-5">
                <div class="text-white font-bold mb-2 text-lg">Contact</div>
                <ul class="list-reset leading-normal">
                    <li class="flex items-center">
                        @include('svg.mail', ['class' => 'h-6 w-6 text-brand'])
                        <span class="ml-2">{{ config('settings.contact.email') }}</span>
                    </li>
                    <li class="">
                        @include('svg.phone', ['class' => 'h-6 w-6 text-brand'])
                        <span class="ml-2">{{ config('settings.contact.phone') }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</footer>
