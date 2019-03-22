@extends('layouts.page', [
    'title' => 'Blog',
    'breadcrumbUrl' => route('post.index'),
    'imageUrl' => asset('images/default/blog.jpg'),
])

@section('page')
    <section class="max-w-3xl mx-auto">
        <div class="px-8">
            <div class="flex flex-wrap -mx-8">
                @foreach($posts as $post)
                    <a href="{{ route('post.show', $post->slug) }}" class="w-full md:w-1/2 lg:w-1/3 px-6 mb-8">
                        <div class="tour flex flex-col shadow mb-4 lg:mb-8 rounded-lg overflow-hidden">
                            <div class="img-zoom-wrapper mb-4">
                                <img
                                    class="h-auto w-full img-zoom"
                                    alt="{{ $post->title }}"
                                    src="{{ $post->getFirstMediaUrl(\App\Post::COVER_COLLECTION) }}"
                                />
                            </div>
                            <div class="h-full w-auto flex flex-col justify-start px-5 pb-5">
                                <h1 class="text-lg font-bold text-black mb-2">{{ $post->title }}</h1>
                                <p class="mb-4 text-grey-darker">{{ str_limit($post->description, 100, '...') }}</p>
                                <button class="link-reset" href="{{ $post->slug }}">READ MORE</button>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection
