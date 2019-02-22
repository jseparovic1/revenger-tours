<?php

namespace App\Notifications;

use App\Dto\TourRequestDto;
use App\Mail\TourRequested;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class TourRequestSubmitted extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var TourRequestDto
     */
    private $tourRequestDto;

    public function __construct(TourRequestDto $tourRequestDto)
    {
        $this->tourRequestDto = $tourRequestDto;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array
     */
    public function via()
    {
        return ['mail'];
    }

    /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationForMail()
    {
        return config('settings.contact.email');
    }

    /**
     * Get the mail representation of the notification.
     *
     * @return TourRequested
     */
    public function toMail()
    {
        return (new TourRequested($this->tourRequestDto))->to(config('settings.contact.email'));
    }
}
