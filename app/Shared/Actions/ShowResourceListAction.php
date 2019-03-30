<?php

declare(strict_types=1);

namespace App\Shared\Actions;

use App\Shared\Field\FieldInterface;
use App\Shared\Resource\AbstractResource;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ShowResourceListAction
{
    public function __invoke(Request $request)
    {
        /** @var AbstractResource $resource */
        $resource = $request->route()->getAction('resource');
        $template = $request->route()->getAction('template');

        $model = $resource::$model;

        $data = $model::all();

        $fields = $resource->fieldsForAction("index");

        $tableHeaders = array_map(function (FieldInterface $field) {
            return Str::title($field->name());
        }, $fields);

        return view($template, [
            "fields" => $fields,
            "tableHeaders" => $tableHeaders,
            "resources" => $data,
            "base" => $resource,
        ]);
    }
}
