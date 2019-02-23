<?php

declare(strict_types=1);

namespace App\Http\Controllers\Tour;

use App\Dto\TourRequestDto;
use App\Http\Controllers\Controller;
use App\Http\Requests\SendTourRequest;
use App\Mail\TourRequested;
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
        $this->mailer->send(
            new TourRequested(TourRequestDto::create($tourRequest->validated()))
        );

        return [
            'status' => 200,
            'message' => 'OK',
        ];
    }
}

