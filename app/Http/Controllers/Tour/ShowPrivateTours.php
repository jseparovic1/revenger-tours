<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tour;

use App\Tour;

class ShowPrivateTours
{
    public function __invoke()
    {
        return response()->view('toursPrivate.show', [
            'tours' => Tour::where('type', 'private')->get(),
        ]);
    }
}
