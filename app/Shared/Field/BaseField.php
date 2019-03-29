<?php

declare(strict_types=1);

namespace App\Shared\Field;

abstract class BaseField
{
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

    public function __construct(string $name, string $columnName = '')
    {
        $this->name = $name;
        $this->columnName = $columnName ?? $this->generateColumnName();
    }

    public static function create(string $name, string $columnName = ''): self
    {
        return new static($name, $columnName);
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

    private function generateColumnName(): string
    {
        return Str::snake($this->name);
    }

    private function generatePlaceholder(): string
    {
        return $this->placeholder = "Enter $this->name";
    }
}
