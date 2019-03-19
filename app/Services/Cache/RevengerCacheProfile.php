<?php

namespace App\Services\Cache;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Spatie\ResponseCache\CacheProfiles\BaseCacheProfile;

class RevengerCacheProfile extends BaseCacheProfile
{
    public function shouldCacheRequest(Request $request): bool
    {
        if ($request->ajax()) {
            return false;
        }

        if ($this->isRunningInConsole()) {
            return false;
        }

        if ($this->isAdminRequest($request)) {
            return false;
        }

        return $request->isMethod('get');
    }

    public function shouldCacheResponse(Response $response): bool
    {
        return $response->isSuccessful() || $response->isRedirection();
    }

    protected function isAdminRequest(Request $request): bool
    {
        return str_contains($request->path(), 'admin');
    }
}
