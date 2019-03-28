<section class="bg-white md:bg-transparent">
    <div class="max-w-3xl mx-auto">
        <div class="flex flex-col items-center space-between">
            <h1 class="heading-title text-center">{{ config('settings.main_blog.title') }}</h1>
            <p class="heading-description">{{ config('settings.main_blog.description') }}</p>
            <div class="featured flex flex-row flex-wrap md:flex-no-wrap -mx-4 self-stretch mb-4">
                @foreach($posts as $post)
                    <div class="tour w-full mx-4 flex flex-col md:shadow mb-4 md:mb-0 rounded-lg overflow-hidden">
                        <img class="h-auto w-full bg-cover"
                             alt="{{ $post->title . ' image' }}"
                             src="{{ $post->getFirstMediaUrl(\App\Post::COVER_COLLECTION) }}"
                        />
                        <a class="flex flex-col h-full justify-around p-5 hover:text-brand rounded-b-lg" href="{{ $post->slug }}">
                            <h1 class="text-lg font-semibold text-black mb-2">{{ $post->title }}</h1>
                            <p class="text-grey-darkest">{{ $post->description }}</p>
                            <a class="text-grey text-sm p-5" href="{{ $post->slug }}">READ MORE</a>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
