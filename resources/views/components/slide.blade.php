<div class="swiper-slide z-50 relative">
    <div
        class="container max-w-3xl px-12 slide__hero border-brand absolute z-20 pin-x pin-y flex items-center leading-loose">
        <div class="flex flex-col text-center w-84 z-10">
            {{ $slot }}
        </div>
    </div>
    <div class="slider-overlay"></div>
    {{ $image }}
</div>

