<?php

declare(strict_types=1);

namespace App\Http\Controllers\Contact;

use App\Dto\ContactRequestDto;
use App\Http\Requests\ContactRequest;
use App\Mail\Contact;
use Illuminate\Contracts\Mail\Mailer;

class SendContactRequestAction
{
    /** @var Mailer */
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function __invoke(ContactRequest $tourRequest)
    {
        $this->mailer->send(
            new Contact(ContactRequestDto::create($tourRequest->validated()))
        );

        return [
            'status' => 200,
            'message' => 'OK',
        ];
    }
}
