<?php

namespace App;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * Class Tour
 * @package App
 */
class Tour extends Model implements HasMedia
{
    use HasMediaTrait, HasSlug;

    protected $casts = [
        'featured' => 'boolean',
        'recommended' => 'boolean',
        'price' => 'integer',
        'itinerary' => 'array',
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
        $this->addMediaCollection('hero_original')
            ->singleFile()
        ;
    }
    public function registerMediaConversions(Media $media = null)
    {
        $this
            ->addMediaConversion('card')
            ->width(400)
            ->height(250)
        ;

        $this
            ->addMediaConversion('hero')
            ->optimize()
            ->withResponsiveImages()
            ->performOnCollections('hero_original')
        ;
    }
}
