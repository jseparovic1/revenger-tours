<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tour;

use App\Dto\TourRequestDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\SendTourRequest;
use App\Mail\TourRequested;
use App\Tour;
use Illuminate\Contracts\Mail\Mailer;

class SendTourRequestAction extends Controller
{
    /**
     * @var Mailer
     */
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function __invoke(SendTourRequest $tourRequest)
    {
        $tour = Tour::findOrFail($tourRequest->get('tour'));

        $this->mailer->send(
            new TourRequested(TourRequestDto::create(
                array_merge($tourRequest->validated(), compact('tour')))
            )
        );

        return [
            'status' => 200,
            'message' => 'OK',
        ];
    }
}

