<?php

namespace App;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Post extends Model implements HasMedia
{
    use HasMediaTrait, HasSlug;

    const COVER_COLLECTION = 'cover';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate()
            ->slugsShouldBeNoLongerThan(20);
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection(self::COVER_COLLECTION)
            ->singleFile();
    }

    public function coverImageUrl(): ?string
    {
        return $this->getFirstMediaUrl(self::COVER_COLLECTION);
    }
}
