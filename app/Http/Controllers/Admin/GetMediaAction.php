<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;

class GetMediaAction
{
    public function __invoke(string $mediaId, Request $request)
    {
        /** @var Media $media */
        $media = Media::findOrFail($mediaId);

        return response()->json([
            'url' => $media->getFullUrl(),
            'name' => $media->file_name,
            'size' => $media->size,
            'mimeType' => $media->mime_type
        ]);
    }
}
