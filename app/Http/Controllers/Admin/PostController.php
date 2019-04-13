<?php

namespace App\Http\Controllers\Admin;

use App\Post;

class PostController extends ResourceController
{
    protected $resource = Post::class;

    protected $identifier = 'slug';

    protected $fields = [
        'title',
        'description',
        'updated_at'
    ];

    protected $imageFields = ['cover'];
}
