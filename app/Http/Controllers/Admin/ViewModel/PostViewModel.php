<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\ViewModel;

use App\Post;

class PostViewModel
{
    /**
     * @var Post
     */
    private $model;

    public function __construct(Post $post)
    {
        $this->model = $post;
    }

    public static function createFromModel(Post $post)
    {
        return new self($post);
    }

    public function title()
    {
        return $this->model->title;
    }

    public function slug(): string
    {
        return $this->model->slug;
    }

    public function description(): string
    {
        return str_limit($this->model->description, '50', '...');
    }

    public function updated_at(): string
    {
        return $this->model->updated_at->diffForHumans();
    }
}
