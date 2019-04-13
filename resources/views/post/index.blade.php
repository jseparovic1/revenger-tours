@extends('layouts.page', [
    'title' => 'Blog',
    'breadcrumbUrl' => route('posts.index'),
    'imageUrl' => asset('images/default/blog.jpg'),
])

@section('page')
    <section class="max-w-3xl mx-auto">
        <div class="flex flex-wrap -mx-4 overflow-hidden">
            @foreach($posts as $post)
                <a href="{{ route('posts.show', ['post' => $post->slug]) }}" class="flex my-8 px-4 w-full md:w-1/2 lg:w-1/3 xl:w-1/3 group">
                    <div class="tour flex flex-col shadow rounded-lg overflow-hidden flex-1">
                        <div class="img-zoom-wrapper mb-4 h-auto">
                            <img
                                class="h-auto w-full img-zoom"
                                alt="{{ $post->title }}"
                                src="{{ $post->getFirstMediaUrl(\App\Post::COVER_COLLECTION) }}"
                            />
                        </div>
                        <div class="flex flex-col px-5 mb-4 justify-between flex-1">
                            <div class="flex-1">
                                <h1 class="text-lg font-bold text-black mb-2">{{ $post->title }}</h1>
                                <p class="text-grey-darker mb-4">{{ str_limit($post->description, 100, '...') }}</p>
                            </div>
                            <button
                                class="text-left text-grey text-sm hover:text-brand cursor-pointer focus:outline-none group-hover:text-brand"
                                onclick='window.location.href="{{ route('posts.show', ['post' => $post->slug]) }}"'>
                                READ MORE
                            </button>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
