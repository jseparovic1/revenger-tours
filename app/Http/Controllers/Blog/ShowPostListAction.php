<?php

declare(strict_types=1);

namespace App\Http\Controllers\Blog;

use App\Post;

class ShowPostListAction
{
    public function __invoke()
    {
        $posts = Post::paginate(6);

        return view('post.index', compact('posts'));
    }
}
