<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Tour extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $casts = [
        'featured' => 'boolean',
        'recommended' => 'boolean',
    ];

    public function registerMediaCollections()
    {
        $this->addMediaCollection('hero')
            ->singleFile()
        ;
    }
    public function registerMediaConversions(Media $media = null)
    {
        $this
            ->addMediaConversion('card')
            ->width(400)
            ->height(250);
    }
}
