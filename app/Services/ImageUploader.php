<?php

declare(strict_types=1);

namespace App\Services;

class ImageUploader
{
    /**
     * Uploads images from temporary resource to collection
     *
     * @param $resource
     * @param $images
     * @param $imageCollection
     */
    public function uploadForResource($resource, string $imageCollection, ?array $images)
    {
        $storedMedia = $resource->media->pluck('file_name')->toArray();

        collect($images)
            ->reject(function ($image) use ($storedMedia) {
                return in_array($image, $storedMedia);
            })->each(function ($image) use ($resource, $imageCollection) {
                $resource
                    ->addMedia(Storage::disk(Disk::TEMPORARY)->path($image))
                    ->toMediaCollection($imageCollection);
            });
    }
}
