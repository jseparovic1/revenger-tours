<div class="flex flex-col mb-8">
    <div class="text-xl font-bold pb-2 border-b border-grey mb-4">Popular posts</div>
    @foreach($posts as $post)
        @include('post._latest_post', ['post' => $post])
    @endforeach
</div>
