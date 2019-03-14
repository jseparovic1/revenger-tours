<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Constants\Disk;
use App\Services\FileNameGenerator;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class ImageController
{
    /**
     * @var FileNameGenerator
     */
    private $fileNameGenerator;

    public function __construct(FileNameGenerator $fileNameGenerator)
    {
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
            ['disk' => Disk::TEMPORARY]
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
}
