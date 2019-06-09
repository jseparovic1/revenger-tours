<?php

namespace App;

use App\Services\TimeProvider;
use Carbon\Carbon;
use Spatie\Image\Manipulations;
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

    protected $appends = [
        'price_now'
    ];

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
     * Itinerary mutator
     *
     * @param string $itiernaryAsJson
     * @return mixed
     */
    public function getItineraryAttribute(string $itineraryAsJson)
    {
        return json_decode($itineraryAsJson, true);
    }

    /**
     * Find tour price based on current date
     * @return int
     */
    public function priceNow(): int
    {
        return $this->price;
    }

    public function getPriceNowAttribute(): int
    {
        return $this->attributes['price_now'] = $this->priceNow();
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

    public function getHeroImageUrl(): string
    {
        return $this->getFirstMedia('hero_original')->getUrl('hero');
    }
}
