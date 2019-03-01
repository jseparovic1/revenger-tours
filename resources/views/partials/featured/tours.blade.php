<section class="bg-white md:bg-transparent">
    <div class="container">
        <div class="flex flex-col items-center space-between">
            <h1 class="heading-title text-center">Chose from our recommended tours</h1>
            <p class="heading-description">
                Lorem ipsum dolor sit amet consectetur adipiscing elit Etiam at ipsum at ligula vestibulum sodales Sed luctus orci vel nibh aliquam laoreet Aenean accumsan
            </p>
            <div class="featured flex flex-row flex-wrap md:flex-no-wrap -mx-4 self-stretch mb-4">
                @foreach($recommended as $tour)
                    @include('partials.featured.tour', [
                        'title' => $tour->title,
                        'description' => $tour->hero_description,
                        'media' => $tour->getFirstMedia('hero_original')->getUrl('hero'),
                        'action' => route('tours.show', $tour->slug)
                    ])
                @endforeach
                    @include('partials.featured.tour', [
                        'title' => 'Private tour',
                        'description' => 'You chose where, we drive!',
                        'media' => asset('images/tour-private/card.jpg'),
                        'action' => '/tours/private',
                    ])
            </div>
        </div>
    </div>
</section>
