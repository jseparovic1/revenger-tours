<section class="container">
    <div class="my-24 flex flex-col items-center space-between px-4">
        <h1 class="text-4xl text-grey-darkest font-bold leading-tight mb-2">Chose from our recommended tours</h1>
        <p class="text-grey-darkest font-sm text-sm lg:w-84 mb-16">
            Lorem ipsum dolor sit amet consectetur adipiscing elit Etiam at ipsum at ligula vestibulum sodales Sed luctus orci vel nibh aliquam laoreet Aenean accumsan
        </p>
        <div class="featured flex flex-row flex-wrap md:flex-no-wrap justify-between -mx-4">
            @include('partials.featured.tour', [
                'title' => 'Blue lagoon tour',
                'description' => 'Awesome crusing trought dalmatia'
            ])
            @include('partials.featured.tour', [
               'title' => 'Blue lagoon tour',
               'description' => 'Awesome crusing trought dalmatia'
           ])
            @include('partials.featured.tour', [
               'title' => 'Blue lagoon tour',
               'description' => 'Awesome crusing trought dalmatia'
           ])
        </div>
    </div>
</section>
