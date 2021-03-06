<div
    onclick="window.location.href='{{ $action }}'"
    class="block group tour w-full mx-4 flex flex-col shadow mb-4 md:mb-0 rounded-lg overflow-hidden cursor-pointer justify-between">
    <img src="{{ $image }}" data-src="{{$image}}" alt="{{ $tour->title }}" class="w-full bg-cover lozad self-stretch"/>
    <a class="flex flex-col justify-around p-5 rounded-b-lg" href="{{ $action }}">
        <h1 class="text-lg font-semibold text-black mb-2">{{ $title }}</h1>
        <p class="mb-4 text-grey-darkest">{{ $description }}</p>
        <a class="btn btn-primary link-reset group-hover:text-white text-center rounded-none group-hover:bg-brand-darker"
           href="{{ $action }}">
            SEE MORE
        </a>
    </a>
</div>
