<?php

declare(strict_types=1);

namespace App\Dto;

class ContactRequestDto
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $subject;

    /**
     * @var string
     */
    public $message;

    public static function create(array $payload)
    {
        return new self(
            $payload['name'],
            $payload['email'],
            $payload['subject'],
            $payload['message']
        );
    }

    public function __construct(
        string $name,
        string $email,
        string $subject,
        string $message
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }
}
