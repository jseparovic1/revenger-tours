<?php

declare(strict_types=1);

namespace App\Shared\Field;

interface FieldInterface
{
    public static function create(string $name, string $columnName = ''): FieldInterface;

    public function setPlaceholder(string $placeholder);

    public function placeholder(): string;

    public function type(): string;

    public function showOn(): array;

    public function name(): string;

    public function render($value, $action): string;

    public function label(): string;

    public function value();
}
