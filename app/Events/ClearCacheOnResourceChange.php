<?php

namespace App\Events;

use Spatie\ResponseCache\ResponseCache;

class ClearCacheOnResourceChange
{
    /**
     * @var ResponseCache
     */
    private $responseCache;

    public function __construct(ResponseCache $responseCache)
    {
        $this->responseCache = $responseCache;
    }

    /**
     * Handle the event.
     *
     * @param  ResourceChanged  $event
     * @return void
     */
    public function handle(ResourceChanged $event)
    {
        $this->responseCache->clear();
    }
}
