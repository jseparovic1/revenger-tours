<?php

declare(strict_types=1);

namespace App\Shared\Resource;

use App\Shared\Field\FieldInterface;
use Illuminate\Support\Str;

abstract class AbstractResource implements ResourceInterface
{
    public static $model = '';

    public static $displayInNavigation = true;

    /**
     * Defines actions that are skipped
     * @return array
     */
    public function except(): array
    {
        return [];
    }

    /**
     * Defines actions to show
     * @return array
     */
    public function only(): array
    {
        return [];
    }

    public function name(): string
    {
        return Str::lower(class_basename(static::$model));
    }

    public function title(): string
    {
        return Str::title(class_basename(static::$model));
    }

    public function fieldsForAction(string $action): array
    {
        if (empty($this->fields())) {
            return [];
        }

        return collect($this->fields())
            ->filter(function (FieldInterface $field) use ($action) {
                return in_array($action, array_keys($field->showOn()));
            })
            ->toArray();
    }

    public function renderField($model, FieldInterface $field, $action)
    {
        if (! in_array($action, ['index', 'form', 'show'], true)) {
            throw new \InvalidArgumentException("Invalid action name. Valid ones are [index, form, show]");
        }

        return $field->render($model->{$field->name()}, $action);
    }
}
