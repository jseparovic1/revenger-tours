<section class="h-full m-0 p-0 relative">
    <div class="hidden lg:block swiper-container h-half lg:h-screen">
        <div class="swiper-wrapper">
            @foreach($featured as $tour)
                @component('components.slide')
                    @include('home.hero', [
                       'title' => $tour->title,
                       'shortDescription' => $tour->hero_short_description,
                       'description' => $tour->hero_description,
                       'callToAction' => "LET'S GO",
                       'link' => route('tours.show', ['tour' => $tour->slug]),
                   ])
                    @slot('image')
                        @if($tour->getFirstMedia('hero_original'))
                            {{ $tour->getFirstMedia('hero_original')('hero') }}
                        @else
                            <img src="{{ asset('images/default/tour.jpg') }}" alt="{{ $tour->title }}">
                        @endif
                    @endslot
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
