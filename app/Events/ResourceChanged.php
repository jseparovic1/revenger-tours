<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;

class ResourceChanged
{
    use Dispatchable, SerializesModels;

    private $resource;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($resource)
    {
        $this->resource = $resource;
    }

    public function resource(): object
    {
        return $this->resource;
    }
}
