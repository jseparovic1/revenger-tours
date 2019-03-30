<?php

declare(strict_types=1);

namespace App\Shared;

use App\Http\Controllers\Tour\PrepareTourRequestAction;
use App\Http\Requests\ShowTourRequest;
use App\Shared\Actions\ShowResourceListAction;
use App\Shared\Resource\ResourceInterface;
use Illuminate\Routing\Router;
use Illuminate\Support\Str;

class ResourceRouteGenerator
{
    /**
     * @var RouterInterface
     */
    private $router;

    protected $routesToGenerate = [
        'index',
        'show',
        'store',
        'create',
        'destroy',
        'update',
        'edit'
    ];

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function for(ResourceInterface $resource)
    {
        $resourceName = $this->routeResourceName($resource);

        $this->normalizeActions($resource);

        $prefix = 'admin';

        $this->router->group(['prefix' => $prefix . '/'], function (Router $router) use ($resourceName, $resource) {
            if (in_array('index', $this->routesToGenerate, true)) {
                $router
                    ->get("$resourceName/index", [
                        'uses' => ShowResourceListAction::class,
                        'template' => 'resource.index',
                        'resource' => $resource
                    ])
                    ->name("$resourceName.index")
                ;
            }

            if (in_array('store', $this->routesToGenerate, true)) {
                $router
                    ->post("$resourceName/", [PrepareTourRequestAction::class])
                    ->name("$resourceName.store")
                ;

                //StoreResourceAction
            }

            if (in_array('create', $this->routesToGenerate, true)) {
                $router
                    ->get("$resourceName/create", [])
                    ->name("$resourceName.create")
                ;

                //CreateResourceAction --> ShowCreateForm
            }

            if (in_array('destroy', $this->routesToGenerate, true)) {
                $router
                    ->delete("$resourceName/{identifier}", [])
                    ->name("$resourceName.destroy")
                ;

                // DestroyResourceAction //-> {resource}
            }
            if (in_array('update', $this->routesToGenerate, true)) {
                $router
                    ->put("$resourceName/{identifier}")
                    ->name("$resourceName.update")
                ;

                //UpdateResourceAction -> {resource}
            }
            if (in_array('edit', $this->routesToGenerate, true)) {
                $router
                    ->get("$resourceName/{identifier}/edit",[])
                    ->name("$resourceName.edit")
                ;

                //EditResourceAction --> ShowEditForm {resource}
            }
        });
    }

    protected function routeResourceName(ResourceInterface $resource): string
    {
        return Str::lower($resource->name());
    }

    protected function normalizeActions(ResourceInterface $resource): void
    {
        if (!empty($resource->only())) {
            $this->routesToGenerate = $resource->only();
        }

        if (!empty($except = $resource->except())) {
            $this->routesToGenerate = array_filter($this->routesToGenerate, function ($action) use ($except) {
                return !in_array($action, $except);
            });
        }
    }
}
