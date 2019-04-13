@extends('layouts.page', [
    'title' => $post->title,
    'breadcrumbUrl' => route('posts.show', ['post' => $post->slug]),
    'imageUrl' => $post->getFirstMediaUrl(\App\Post::COVER_COLLECTION),
])

@section('page')
    <section>
        <div class="max-w-3xl mx-auto flex flex-col lg:flex-row">
            <main class="w-full flex-1 mb-10 mr-0 lg:mr-12 ">
                <div>
                    <h1 class="text-brand-darker">{{ $post->title }}</h1>
                    <div class="text-grey mb-4">
                        Đoni Rogošić {{ $post->updated_at->diffForHumans() }}
                    </div>
                    <div class="blog-content">
                        {!! $post->content !!}
                    </div>
                </div>
            </main>
            <aside class="w:full lg:w-1/3">
                @include('post._latest', ['posts' => $latestPosts])
                @include('tours._partials.help')
            </aside>
        </div>
    </section>
@endsection
