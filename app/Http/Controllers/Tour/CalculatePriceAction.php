<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tour;

use App\Tour;
use Illuminate\Http\Request;

class CalculatePriceAction
{
    public function __invoke(Request $request)
    {
        return response()->json([
            'price' => Tour::find($request->get('tour'))->priceToday(),
        ]);
    }
}
