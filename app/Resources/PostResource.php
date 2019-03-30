<?php

declare(strict_types=1);

namespace App\Resources;

use App\Post;
use App\Shared\Field\Wysiwyg;
use App\Shared\Resource\AbstractResource;
use App\Shared\Field\Text\Text;

class PostResource extends AbstractResource
{
    public static $model = Post::class;

    public function except(): array
    {
        return ['show'];
    }

    public function fields(): array
    {
        return [
              Text::create('title'),
              Text::create('slug'),
              Text::create('description')->hideFromIndex(),
              Wysiwyg::create('content')->hideFromIndex(),
        ];
    }
}
