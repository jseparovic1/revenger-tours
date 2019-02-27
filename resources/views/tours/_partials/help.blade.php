<div class="border-grey border-8 top-20 mb-20 hero-pattern">
    <div class="p-10 flex flex-col justify-around">
        <h1 class="mb-4 text-lg">{{ $title ?? 'Need help?' }}</h1>
        <p>
            {{ $description ?? 'If you need any help regarding trip booking feel free to contact us.' }}
        </p>
        <ul class="list-reset p-5 text-grey-darker text-center">
            <li class="flex items-center">
                @include('svg.mail', ['class' => 'h-6 w-6 text-brand'])
                <span class="ml-4">{{ config('settings.contact.email') }}</span>
            </li>
            <li class="flex items-center">
                @include('svg.phone', ['class' => 'h-6 w-6 text-brand'])
                <span class="ml-4">{{ config('settings.contact.phone') }}</span>
            </li>
        </ul>
    </div>
</div>
