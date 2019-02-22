<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tour;

use App\Dto\TourRequestDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\SendTourRequest;
use App\Notifications\TourRequestSubmitted;
use Illuminate\Support\Facades\Notification;

class SendTourRequestAction extends Controller
{
    public function __invoke(SendTourRequest $tourRequest)
    {
        Notification::route('mail', config('settings.contact.email'))
            ->notify(new TourRequestSubmitted(TourRequestDto::create($tourRequest->validated())));

        return [
            'status' => 200,
            'message' => 'OK',
        ];
    }
}

