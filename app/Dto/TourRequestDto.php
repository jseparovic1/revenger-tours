<?php

declare(strict_types=1);

namespace App\Dto;

use App\Tour;
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

    /**
     * @var Tour
     */
    public $tour;

    public static function create(array $payload)
    {
        return new self(
            $payload['dateInput'],
            (int) $payload['people'],
            $payload['email'],
            $payload['tour'],
            $payload['comment'] ?? null
        );
    }

    public function __construct(
        string $date,
        int $people,
        string $email,
        Tour $tour,
        ?string $comment = ''
    ) {
        $this->date = Carbon::parse($date);
        $this->people = $people;
        $this->email = $email;
        $this->tour = $tour;
        $this->comment = $comment;
    }
}
