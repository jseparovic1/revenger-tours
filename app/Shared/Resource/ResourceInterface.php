<?php

declare(strict_types=1);

namespace App\Shared\Resource;

interface ResourceInterface
{
    public function except(): array;

    public function only(): array;

    public function fields();

    public function name(): string;
}

//Routes        -> Action
//GET resource.index -> index | show resources
//POST resource.store -> store | store resources
//GET resource.create -> create | create resource
//GET resource.show -> show | show resource
//DELETE resource.destroy -> destroy | delete resource
//PUT|PATCH resource.update -> update | update resrource
//GET resource.update -> edit | show edit form

//$resource::class
//$resource::displayInNavigation
//$resource->name = 'App\Post => Post';
//$resource->actions = ['index', 'show', 'store', 'create', 'edit', 'update', 'delete'];

//foreach  $resource->fields
//    $field->type  //text, wysiwyg, textarea, checkbox, custom
//    $field->label
//    $field->placeholder
//    $field->name
//endforeach
//
//
////registering resources
//protected function resources()
//{
//    Nova::resourcesIn(app_path('Nova'));
//
//    Nova::resources([
//        User::class,
//        Post::class,
//    ]);
//}
