<section class="h-full m-0 p-0">
    <div class="hidden md:block swiper-container h-screen border-b">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div
                    class="slide__hero border-brand absolute z-20 pin-x pin-y flex items-center ml-8 lg:ml-32 leading-loose">
                    <div class="flex flex-col text-center w-84 -mt-5">
                        @include('partials.hero', [
                            'title' => 'Pakleni islands',
                            'shortDescription' => 'Feel the vibe',
                            'description' => ' Sailing around the labyrinth of Pakleni islands! Find hidden beautiful beaches and deserted lagoons',
                            'callToAction' => "LET'S GO"
                        ])
                    </div>
                </div>
                <img class="image-bg" src="{{ asset('images/header/tour.jpg') }}"/>
            </div>
            <div class="swiper-slide bg-grey-darkest">
                <div class="slide__hero border-brand absolute z-20 pin-x pin-y flex items-center ml-32 leading-loose">
                    <div class="flex flex-col text-center w-84 -mt-5">
                        @include('partials.hero', [
                           'title' => 'Pakleni islands',
                           'shortDescription' => 'Feel the vibe',
                           'description' => ' Sailing around the labyrinth of Pakleni islands! Find hidden beautiful beaches and deserted lagoons',
                           'callToAction' => "LET'S GO"
                       ])
                    </div>
                </div>
                <img class="image-bg" src="{{ asset('images/header/boat.jpg') }}"/>
            </div>
            <div class="swiper-slide bg-grey-darkest">
                <div class="slide__hero border-brand absolute z-20 pin-x pin-y flex items-center ml-32 leading-loose">
                    <div class="flex flex-col text-center w-84 -mt-5">
                        @include('partials.hero', [
                            'title' => 'Pakleni islands',
                            'shortDescription' => 'Feel the vibe',
                            'description' => ' Sailing around the labyrinth of Pakleni islands! Find hidden beautiful beaches and deserted lagoons',
                            'callToAction' => "LET'S GO"
                        ])
                    </div>
                </div>
                <img class="image-bg" src="{{ asset('images/header/zrak.jpg') }}"/>
            </div>
        </div>
        <div class="slider-control -mt-12">
            <div class="slider-control--next mb-2 px-4 flex flex-col justify-center items-center">
                <span class="text-white text-4xl">></span>
            </div>
            <div class="slider-control--prev px-4  flex flex-col justify-center items-center">
                <span class="text-white text-4xl"><</span>
            </div>
        </div>
    </div>
</section>
