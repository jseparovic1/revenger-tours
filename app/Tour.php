<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Tour extends Model implements HasMedia
{
    use HasMediaTrait, HasSlug;

    protected $casts = [
        'featured' => 'boolean',
        'recommended' => 'boolean',
    ];

    /**
     * @return mixed|string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate()
            ->slugsShouldBeNoLongerThan(20)
        ;
    }

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
