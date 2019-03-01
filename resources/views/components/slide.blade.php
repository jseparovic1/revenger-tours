<div class="relative swiper-slide">
    <div
        class="slide__hero border-brand absolute z-20 pin-x pin-y flex items-center pl-8 lg:pl-32 leading-loose">
        <div class="flex flex-col text-center w-84 -mt-5 z-10">
            {{ $slot }}
        </div>
        <div class="slider-overlay"></div>
    </div>
    {{ $image }}
</div>
