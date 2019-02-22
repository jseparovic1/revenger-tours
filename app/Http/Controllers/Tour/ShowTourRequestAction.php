<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tour;

use App\Http\Requests\ShowTourRequest;
use Carbon\Carbon;

class ShowTourRequestAction
{
    public function __invoke(ShowTourRequest $request)
    {
        return view('contact.request', [
            'tripDate' => Carbon::parse($request->tripDate())->toDateString(),
            'people' => $request->people(),
        ]);
    }
}