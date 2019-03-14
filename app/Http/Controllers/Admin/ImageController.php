<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Services\FileNameGenerator;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Contracts\Filesystem\Factory as Filesystem;

class ImageController
{
    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @var FileNameGenerator
     */
    private $fileNameGenerator;

    public function __construct(Filesystem $filesystem, FileNameGenerator $fileNameGenerator)
    {
        $this->filesystem = $filesystem;
        $this->fileNameGenerator = $fileNameGenerator;
    }

    public function show(string $mediaId)
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
        $resource = $request->input('resource');

        if ($resource) {
            $collectionName = $request->input('collectionName');
            $id = $request->input('resourceId');

            /** @var HasMedia $resourceFromDb */
            $resourceFromDb = $resource::findOrFail($id);
            $resourceFromDb->addMedia($file)->toMediaCollection($collectionName);

             return response()->json([
                 'name' => $file->getClientOriginalName(),
                 'originalName' => $file->getClientOriginalName(),
             ]);
        }

        $file->storeAs(
            '.',
            $fileName = $this->fileNameGenerator->forImage($file->getClientOriginalName()),
            ['disk' => 'temporary']
        );

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
