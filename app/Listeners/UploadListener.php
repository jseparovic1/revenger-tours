<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;
use Orchid\Platform\Events\UploadFileEvent;

class UploadListener implements ShouldQueue
{
    use InteractsWithQueue;

    public function handle(UploadFileEvent $event): void
    {
        $attachment = $event->attachment;

        if ($attachment->group === 'hero') {
            $image = Storage::disk($attachment->disk)->get($attachment->physicalPath());

            $hero = Image::make($image)
                ->resize(1280, 720, function(Constraint $constraint) {
                    $constraint->aspectRatio();
                })
                ->encode($attachment->extension, 75);

            Storage::disk('public')->put($attachment->physicalPath(), $hero->stream());
        }
    }
}
