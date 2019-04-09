<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin\ViewModel;

use Illuminate\Support\Str;

trait DefaultResourceParameters
{
    /**
     * Defines route key eg. admin.resourceRouteKey.action
     * @var string
     */
    protected $resourceRouteKey = null;

    protected function resourceRouteKey(): string
    {
        if (is_null($this->resourceRouteKey)) {
            return Str::plural(Str::lower(class_basename($this->resource)));
        }

        return $this->resourceRouteKey;
    }

    protected function resourceName(): string
    {
        if (is_null($this->resourceName)) {
            return class_basename($this->resource);
        }

        return $this->resourceName;
    }

    protected function viewModel(): string
    {
        if (is_null($this->viewModel)) {
            return 'App\\Http\\Controllers\\Admin\\ViewModel\\'. $this->resourceName() . 'ViewModel';
        }

        return $this->viewModel;
    }

    protected function requestClass(): string
    {
        if (is_null($this->requestClass)) {
            return 'App\\Http\\Requests\\Admin\\' . $this->resourceName() . 'ResourceRequest';
        }

        return $this->requestClass;
    }
}
