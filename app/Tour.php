<?php

namespace App;

use Orchid\Attachment\Attachable;
use Orchid\Screen\AsSource;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Tour extends Model implements HasMedia
{
    use HasMediaTrait, AsSource, Attachable;

    protected $fillable = [
        'title',
        'slug',
        'type',
        'price',
        'description',
        'hero_description',
        'short_description',
        'departure_location',
        'departure_time',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'recommended' => 'boolean',
        'price' => 'integer',
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('hero_original')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('hero')
                    ->fit(Manipulations::FIT_CONTAIN, 1920, 1080)
                    ->withResponsiveImages()
                ;

                $this->addMediaConversion('card')
                    ->fit(Manipulations::FIT_CONTAIN, 800, 600)
                    ->withResponsiveImages()
                ;
            })
        ;
    }

    public function getHeroImageUrl(): ?string
    {
        return $this->getFirstMedia('hero_original') !== null
            ? $this->getFirstMedia('hero_original')->getUrl('hero')
            : null;
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
