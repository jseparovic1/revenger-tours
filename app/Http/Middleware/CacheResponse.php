<?php

namespace App\Http\Middleware;

use Closure;
use Spatie\ResponseCache\ResponseCache;
use Symfony\Component\HttpFoundation\Response;

class CacheResponse
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
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $lifetimeInMinutes = null)
    {
        if ($this->responseCache->enabled($request)) {
            if ($this->responseCache->hasBeenCached($request)) {
                return $this->changeCsrfToken(
                    $this->responseCache->getCachedResponseFor($request)
                );
            }
        }

        $response = $next($request);

        if ($this->responseCache->enabled($request)) {
            if ($this->responseCache->shouldCache($request, $response)) {
                $this->responseCache->cacheResponse($request, $response, $lifetimeInMinutes);
            }
        }

        return $response;
    }

    private function changeCsrfToken(Response $response)
    {
        $cachedContent = $response->getContent();
        $pattern = '/<meta name="csrf-token" content="([^"]+)">/';

        if (preg_match($pattern, $cachedContent, $matches)) {
            $cachedCsrf = $matches[1];
            $updatedContent = str_replace($cachedCsrf, csrf_token(), $cachedContent);
            $response->setContent($updatedContent);
        }

        return $response;
    }
}
