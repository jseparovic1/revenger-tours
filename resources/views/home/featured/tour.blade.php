<div class="tour w-full mx-4 flex flex-col md:shadow mb-4 md:mb-0 rounded-lg overflow-hidden">
    <img class="h-auto w-full bg-cover"
         @if(is_string($media))
         src="{{$media}}"
         @else
         src="{{ $media->getUrl('card') }}"
        @endif
    />
    <a class="flex flex-col h-full justify-around p-5 hover:text-brand rounded-b-lg" href="{{ $action }}">
        <h1 class="text-lg font-semibold text-black mb-2">{{ $title }}</h1>
        <p class="mb-4 text-grey-darkest">{{ $description }}</p>
        <a class="btn btn-primary link-reset hover:text-white text-center rounded-none" href="{{ $action }}">SEE MORE</a>
    </a>
</div>
