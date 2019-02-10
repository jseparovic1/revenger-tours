<section>
    <div class="container">
        <div class="my-5 lg:my-24 flex flex-col items-center space-between px-4">
            <h1 class="heading-title text-center">Chose from our recommended tours</h1>
            <p class="heading-description">
                Lorem ipsum dolor sit amet consectetur adipiscing elit Etiam at ipsum at ligula vestibulum sodales Sed luctus orci vel nibh aliquam laoreet Aenean accumsan
            </p>
            <div class="featured flex flex-row flex-wrap md:flex-no-wrap -mx-4 self-stretch">
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
    </div>
</section>
