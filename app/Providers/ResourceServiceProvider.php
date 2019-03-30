<?php

namespace App\Providers;

use App\Resources\PostResource;
use App\Shared\ResourceRegistry;
use Illuminate\Support\ServiceProvider;

class ResourceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(ResourceRegistry $resourceRegistry)
    {
        $resourceRegistry->add(PostResource::class);
    }
}
