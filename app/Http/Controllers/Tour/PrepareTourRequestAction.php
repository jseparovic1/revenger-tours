<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tour;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowTourRequest;
use Carbon\Carbon;

class PrepareTourRequestAction extends Controller
{
    public function __invoke(ShowTourRequest $tourRequest)
    {
        return response()->redirectToRoute(
            'request.show', [
            'trip_date' => Carbon::parse($tourRequest->tripDate())->toDateString(),
            'people' => $tourRequest->people(),
            'tour' => $tourRequest->tourId(),
        ]);
    }
}

