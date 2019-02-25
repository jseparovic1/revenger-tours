<?php

declare(strict_types=1);

namespace App\Dto;

use Carbon\Carbon;

class TourRequestDto
{
    /**
     * @var string
     */
    public $date;

    /**
     * @var int
     */
    public $people;

    /**
     * @var string
     */
    public $email;

    /**
     * @var Carbon
     */
    public $comment;

    public static function create(array $payload)
    {
        return new self(
            $payload['dateInput'],
            (int) $payload['people'],
            $payload['email'],
            $payload['comment'] ?? null
        );
    }

    public function __construct(
        string $date,
        int $people,
        string $email,
        ?string $comment = ''
    ) {
        $this->date = Carbon::parse($date);
        $this->people = $people;
        $this->email = $email;
        $this->comment = $comment;
    }
}
