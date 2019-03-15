<section class="lg:hidden m-0 p-0">
    <div class="hero flex justify-start px-4">
        @include('home.hero', [
            'title' => $singleFeatured->title,
           'shortDescription' => $singleFeatured->hero_short_description,
           'description' => $singleFeatured->hero_description,
           'link' => route('tours.show', ['tour' => $singleFeatured->slug]),
           'callToAction' => "LET'S GO"
        ])
    </div>
</section>
