<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tour;


use App\Http\Requests\ShowTourRequest;
use App\Tour;
use Carbon\Carbon;

class ShowTourRequestAction
{
    public function __invoke(ShowTourRequest $request)
    {
        if ($request->has(['trip_date', 'people'])) {
            return view('contact.request', [
                'tripDate' => Carbon::parse($request->tripDate())->toDateString(),
                'people' => $request->people(),
                'tour' => Tour::findOrFail($request->tourId()),
            ]);
        }

        return view('contact.request');
    }
}
