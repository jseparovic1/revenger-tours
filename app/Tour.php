<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Orchid\Attachment\Attachable;
use Orchid\Attachment\Models\Attachment;
use Orchid\Screen\AsSource;

class Tour extends Model
{
    use AsSource, Attachable;

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

    public function hero(): MorphToMany
    {
        return $this->attachment('hero');
    }

    public function gallery(): MorphToMany
    {
        return $this->attachment('gallery');
    }

    public function getHeroImage(): string
    {
        /** @var Attachment $heroImage */
        $heroImage = $this->hero()->first();

        return $heroImage !== null ? $heroImage->getUrlAttribute(): 'https://source.unsplash.com/1600x900/?sea,boat,summer';
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
