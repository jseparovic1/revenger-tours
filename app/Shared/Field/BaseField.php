<?php

declare(strict_types=1);

namespace App\Shared\Field;

use Illuminate\Support\Str;
use Illuminate\View\Factory as ViewFactory;

abstract class BaseField implements FieldInterface
{
    use FieldVisibility;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $columnName;

    /**
     * @var string
     */
    private $placeholder;

    private $value;

    public function __construct(string $name, string $columnName = '')
    {
        $this->name = $name;
        $this->columnName = $columnName ?? $this->generateColumnName();
    }

    public static function create(string $name, string $columnName = ''): FieldInterface
    {
        return new static($name, $columnName);
    }

    public function render($value, $action): string
    {
        $this->value = $value;

        $viewFactory = app(ViewFactory::class);

        $fieldFolderName = Str::ucfirst($this->type());

        return $viewFactory
            ->file(__DIR__ . "/{$fieldFolderName}/{$action}.blade.php", ['field' => $this])
            ->render();
    }

    public function value()
    {
        return $this->value;
    }

    public function setPlaceholder(string $placeholder)
    {
        $this->placeholder = $placeholder;
    }

    public function placeholder(): string
    {
        if (empty($this->placeholder)) {
            $this->generatePlaceholder();
        }

        return $this->placeholder;
    }

    public function label(): string
    {
        return Str::title(str_replace('_', ' ', $this->name));
    }

    public function name(): string
    {
        return $this->name;
    }

    private function generateColumnName(): string
    {
        return Str::snake($this->name);
    }

    private function generatePlaceholder(): string
    {
        return $this->placeholder = "Enter $this->name";
    }

}
