<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

/**
 * App\Tour
 *
 * @property int $id
 * @property string $hero_short_description
 * @property string $hero_description
 * @property bool $featured
 * @property bool $recommended
 * @property string $type
 * @property string $card_description
 * @property string $slug
 * @property string $title
 * @property string|null $details
 * @property array $price
 * @property array $itinerary
 * @property string $departure_location
 * @property string $departure_time
 * @property string $included
 * @property string $not_included
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\MediaLibrary\Models\Media[] $media
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tour newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tour newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tour query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tour whereCardDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tour whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tour whereDepartureLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tour whereDepartureTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tour whereDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tour whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tour whereHeroDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tour whereHeroShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tour whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tour whereIncluded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tour whereItinerary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tour whereNotIncluded($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tour wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tour whereRecommended($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tour whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tour whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tour whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tour whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tour extends Model implements HasMedia
{
    use HasMediaTrait, HasSlug;

    protected $casts = [
        'featured' => 'boolean',
        'recommended' => 'boolean',
        'price' => 'array',
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
