<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Filesystem\Filesystem;

class ImageController
{
    /**
     * @var Filesystem
     */
    private $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function show(string $mediaId, Request $request)
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

    public function store(Request $request)
    {
        $file = $request->file('file');

        $fileName = sprintf("%s_%s", Str::uuid(), $file->getClientOriginalName());

        $file->move($this->storagePath(), $fileName);

        return response()->json([
            'name' => $fileName,
            'originalName' => $file->getClientOriginalName(),
        ]);
    }

    public function destroy(string $mediaId)
    {
        /** @var Media $media */
        $media = Media::findOrFail($mediaId);

        $media->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Image deleted'
        ]);
    }

    protected function storagePath()
    {
        return tap(storage_path('tmp/uploads'), function ($path) {
            if (!$this->filesystem->isDirectory($path) ) {
                mkdir($path, 0777, true);
            }
        });
    }
}
