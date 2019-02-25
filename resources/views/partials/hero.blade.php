<div class="flex flex-col justify-center text-center max-w-md px-4 py-8 mt-16 md:p-0 md:mt-0">
    <div class="text-base md:text-2xl text-white tracking-tight flex-1 text-left">{{ $shortDescription }}</div>
    <div
        class="text-3xl md:text-6xl text-white tracking-tight font-bold flex-1 text-left border-l-4 md:border-l-8 border-brand pl-2 md:pl-5">
        {{ $title }}
    </div>
    <div class="text-base md:text-xl text-white flex-1 text-left mb-8 py-4">
        {{ $description }}
    </div>
    <a
        href="{{ $link }}"
        class="w-32 bg-brand-dark hover:bg-brand-darkest font-semibold text-white py-1 md:py-4 px-4 md:px-8 rounded self-center sm:self-start hover:text-white">
        {{ $callToAction }}
    </a>
</div>

