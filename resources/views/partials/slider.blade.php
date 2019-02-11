<section class="h-full m-0 p-0">
    <div class="hidden md:block swiper-container h-screen border-b">
        <div class="swiper-wrapper">
            @component('components.slide', ['image' => asset('images/header/boat.jpg')])
                @include('partials.hero', [
                   'title' => 'Pakleni islands',
                   'shortDescription' => 'Feel the vibe',
                   'description' => ' Sailing around the labyrinth of Pakleni islands! Find hidden beautiful beaches and deserted lagoons',
                   'callToAction' => "LET'S GO"
               ])
            @endcomponent
            @component('components.slide', ['image' => asset('images/header/zrak.jpg')])
                @include('partials.hero', [
                   'title' => 'Pakleni islands',
                   'shortDescription' => 'Feel the vibe',
                   'description' => ' Sailing around the labyrinth of Pakleni islands! Find hidden beautiful beaches and deserted lagoons',
                   'callToAction' => "LET'S GO"
               ])
            @endcomponent
            @component('components.slide', ['image' => asset('images/header/tour.jpg')])
                @include('partials.hero', [
                   'title' => 'Pakleni islands',
                   'shortDescription' => 'Feel the vibe',
                   'description' => ' Sailing around the labyrinth of Pakleni islands! Find hidden beautiful beaches and deserted lagoons',
                   'callToAction' => "LET'S GO"
               ])
            @endcomponent
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
