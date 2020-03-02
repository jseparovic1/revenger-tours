<?php

namespace App;

use Orchid\Screen\AsSource;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Tour extends Model implements HasMedia
{
    use HasMediaTrait, HasSlug, AsSource;

    protected $fillable = [
        'title',
        'slug',
        'type',
        'price',
        'description',
        'hero_description',
        'short_description',
        'included',
        'excluded',
        'departure_location',
        'departure_time',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'recommended' => 'boolean',
        'price' => 'integer',
        'included' => 'array',
        'excluded' => 'array',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate()
            ->slugsShouldBeNoLongerThan(20)
        ;
    }

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
}
