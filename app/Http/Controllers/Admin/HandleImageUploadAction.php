<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HandleImageUploadAction
{
    /**
     * @var Filesystem
     */
    private $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function __invoke(Request $request)
    {
        $file = $request->file('file');

        $fileName = sprintf("%s_%s", Str::uuid(), $file->getClientOriginalName());

        $file->move($this->storagePath(), $fileName);

        return response()->json([
            'name' => $fileName,
            'originalName' => $file->getClientOriginalName(),
        ]);
    }

    protected function storagePath()
    {
        return tap(public_path('tmp/uploads'), function ($path) {
            if (!$this->filesystem->isDirectory($path) ) {
                mkdir($path, 0777, true);
            }
        });
    }
}
