<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tour;

use App\Http\Controllers\Controller;
use App\Http\Requests\SendTourRequest;

class SendTourRequestAction extends Controller
{
    public function __invoke(SendTourRequest $tourRequest)
    {
        return [
            'status' => 200,
            'message' => 'OK',
        ];
    }
}

