<div class="tour w-full mx-4 flex flex-col shadow-lg mb-4 md:mb-0">
    <div class="h-64 bg-cover" style="background-image: url({{ asset('images/header/zrak.jpg') }})"></div>
    <div class="flex flex-col justify-around p-5">
        <h1 class="text-lg font-semibold text-black mb-2">{{ $title }}</h1>
        <p class="mb-4 text-grey-darkest">{{ $description }}</p>
        <button class="btn btn-primary">SEE MORE</button>
    </div>
</div>
