<?php

namespace App\Mail;

use App\Dto\TourRequestDto;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TourRequested extends Mailable implements ShouldQueue
{
    use SerializesModels;

    /**
     * @var TourRequestDto
     */
    private $tourRequest;

    /**
     * Create a new message instance.
     *
     * @param TourRequestDto $tourRequest
     */
    public function __construct(TourRequestDto $tourRequest)
    {
        $this->tourRequest = $tourRequest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('admin@revengertours.com')
            ->to(config('settings.contact.email'))
            ->replyTo($this->tourRequest->email)
            ->markdown('mail.request', [
                'tourRequest' => $this->tourRequest
            ]);
    }
}
