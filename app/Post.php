<?php

namespace App;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Post extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getCoverImage(): string
    {
        /** @TODO make cover image */
        return 'https://source.unsplash.com/1600x900/';
    }

    public function getThumbImg($attributes = []): string
    {
        /** @TODO make thumb image */

        return 'https://source.unsplash.com/800x600/?sea,boat,summer';
    }
}
