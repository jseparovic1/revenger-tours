@php
    /** @var \App\Tour $tour */
@endphp

<section class="h-full m-0 p-0 relative">
    <div class="hidden lg:block swiper-container h-half lg:h-screen">
        <div class="swiper-wrapper">
            @foreach($featured as $tour)
                @component('components.slide', ['image' => $tour->getHeroImage()])
                    @include('home.hero', [
                       'title' => $tour->title,
                       'description' => $tour->hero_description,
                       'callToAction' => "LET'S GO",
                       'link' => route('tours.show', ['tour' => $tour->slug]),
                   ])
                @endcomponent
            @endforeach
        </div>
        <div class="slider-control -mt-12">
            <div class="slider-control--next mb-2 px-4 flex flex-col justify-center items-center">
                <span class="text-white text-4xl">></span>
            </div>
            <div class="slider-control--prev px-4 flex flex-col justify-center items-center">
                <span class="text-white text-4xl"><</span>
            </div>
        </div>
    </div>
</section>
