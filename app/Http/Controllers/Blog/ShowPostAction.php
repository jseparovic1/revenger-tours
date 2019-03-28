<?php

declare(strict_types=1);

namespace App\Http\Controllers\Blog;

use App\Post;

class ShowPostAction
{
    public function __invoke(Post $post)
    {
        $latestPosts = Post::query()
            ->where('slug', '!=', $post->slug)
            ->limit(4)
            ->get()
        ;

        return view('post.show', [
            'post' => $post,
            'latestPosts' => $latestPosts,
        ]);
    }
}
