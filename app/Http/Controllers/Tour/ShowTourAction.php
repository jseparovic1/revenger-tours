<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tour;

use App\Http\Controllers\Controller;
use App\Tour;

class ShowTourAction extends Controller
{
    public function __invoke(Tour $tour)
    {
        return response()->view('tours.show', compact('tour'));
    }
}

