<?php

namespace App;

use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Post extends Model implements HasMedia
{
    use HasMediaTrait;

    const COVER_COLLECTION = 'cover';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function registerMediaCollections()
    {
        $this->addMediaCollection(self::COVER_COLLECTION)
            ->singleFile()
            ->registerMediaConversions(function(Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->fit(Manipulations::FIT_CONTAIN, 640, 460)
                    ->withResponsiveImages()
                ;
            })
        ;
    }

    public function coverImageUrl(): ?string
    {
        return $this->getFirstMediaUrl(self::COVER_COLLECTION);
    }

    public function getThumbImg($attributes = [])
    {
        return self::getFirstMedia(self::COVER_COLLECTION)->img('thumb', $attributes);
    }
}
