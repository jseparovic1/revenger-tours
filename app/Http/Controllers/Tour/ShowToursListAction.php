<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tour;

use App\Tour;

class ShowToursListAction
{
    public function __invoke()
    {
        return response()->view('tours.index', [
            'tours' => Tour::where('type', 'normal')->get(),
        ]);
    }
}
