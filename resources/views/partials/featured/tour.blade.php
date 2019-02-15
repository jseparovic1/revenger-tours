<div class="tour w-full mx-4 flex flex-col md:shadow-lg mb-4 md:mb-0">
    <img class="h-64 bg-cover" src="{{ $media->getUrl('card') }}" />
    <div class="flex flex-col justify-around p-5">
        <h1 class="text-lg font-semibold text-black mb-2">{{ $title }}</h1>
        <p class="mb-4 text-grey-darkest">{{ $description }}</p>
        <button class="btn btn-primary">SEE MORE</button>
    </div>
</div>
