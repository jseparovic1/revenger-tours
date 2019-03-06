<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class HandleImageUploadAction
{
    public function __invoke(Request $request)
    {
        $resource = $request->input('resource');
        $resourceId = $request->input('resourceId');
        $collection = $request->input('collection');

        if (!class_exists($resource)) {
            throw new BadRequestHttpException("Resource not found.");
        }

        /** @var HasMedia $entity */
        $entity = $resource::find(intval($resourceId));

        $entity->addMedia($request->file('files'))
            ->toMediaCollection($collection);

        return response()->json([
            'status' => 'ok'
        ]);
    }
}
