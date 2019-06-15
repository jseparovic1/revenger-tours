<div class="flex flex-col text-center py-8 mt-16 lg:p-0 lg:mt-0 z-50">
    <div
        class="text-3xl lg:text-6xl text-white tracking-tight font-bold flex-1 text-left border-l-4 lg:border-l-8 border-brand pl-2 lg:pl-5">
        {{ $title }}
    </div>
    <div class="text-base md:text-xl text-white flex-1 text-left mb-8 py-4 max-w-md">
        {{ $description }}
    </div>
    <a
        href="{{ $link }}"
        class="w-32 bg-brand-dark hover:bg-brand-darkest font-semibold text-white py-1 lg:py-4 px-4 lg:px-8 rounded self-center sm:self-start hover:text-white">
        {{ $callToAction }}
    </a>
</div>

