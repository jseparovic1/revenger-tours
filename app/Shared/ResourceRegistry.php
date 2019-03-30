<?php

declare(strict_types=1);

namespace App\Shared;

use App\Shared\Resource\ResourceInterface;

class ResourceRegistry
{
    /**
     * @var array|ResourceInterface[]
     */
    private $resources;
    /**
     * @var ResourceRouteGenerator
     */
    private $resourceRouteGenerator;

    public function __construct(ResourceRouteGenerator $resourceRouteGenerator)
    {
        $this->resourceRouteGenerator = $resourceRouteGenerator;
    }

    public function add(string $resource)
    {
        $this->resources[$resource] = new $resource;
        $this->resourceRouteGenerator->for($this->resources[$resource]);
    }

    public function resources()
    {
        return $this->resources;
    }
}
