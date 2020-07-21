<?php

namespace App\Mail;

use App\Dto\ContactRequestDto;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable implements ShouldQueue
{
    use SerializesModels;

    /**
     * @var ContactRequestDto
     */
    private $contactRequestDto;

    /**
     * Create a new message instance.
     *
     * @param ContactRequestDto $contactRequestDto
     */
    public function __construct(ContactRequestDto $contactRequestDto)
    {
        $this->contactRequestDto = $contactRequestDto;
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
            ->subject('Blue Lagoon Trip ' . $this->contactRequestDto->subject)
            ->to(config('settings.contact.email'))
            ->replyTo($this->contactRequestDto->email)
            ->markdown('mail.contact', [
                'contactRequest' => $this->contactRequestDto
            ]);
    }
}
