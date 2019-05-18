<section class="bg-white md:bg-transparent">
    <div class="max-w-3xl mx-auto">
        <div class="flex flex-col items-center space-between">
            <h1 class="heading-title text-center">Chose from our recommended tours</h1>
            <p class="heading-description">
                Lorem ipsum dolor sit amet consectetur adipiscing elit Etiam at ipsum at ligula vestibulum sodales Sed luctus orci vel nibh aliquam laoreet Aenean accumsan
            </p>
            <div class="featured flex flex-row flex-wrap md:flex-no-wrap -mx-4 self-stretch mb-4">
                @foreach($recommended as $tour)
                    @include('home.featured.tour', [
                        'title' => $tour->title,
                        'description' => $tour->hero_description,
                        'imageSrc' => optional($tour->getFirstMedia('hero_original'))->getUrl('card') ?? asset('/images/default/tour.jpg'),
                        'action' => route('tours.show', $tour->slug)
                    ])
                @endforeach
                @include('home.featured.tour', [
                    'title' => 'Private tour',
                    'description' => 'You chose where, we drive! Get best tour expirence with amazing captian Johny and woderfull views.',
                    'imageSrc' => asset('images/tour-private/card.jpg'),
                    'action' => route('toursPrivate.show'),
                ])
            </div>
        </div>
    </div>
</section>
