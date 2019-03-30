<?php

declare(strict_types=1);

namespace App\Shared\Field;

trait FieldVisibility
{
    protected $showOn = [
        'index' => '',
        'show' => '',
        'store' => '',
        'edit' => ''
    ];

    public function hideFromIndex()
    {
        if (array_key_exists("index", $this->showOn)) {
            unset($this->showOn["index"]);
        }

        return $this;
    }

    public function hideFromDetail()
    {
        if (array_key_exists("show", $this->showOn)) {
            unset($this->showOn["show"]);
        }

        return $this;
    }

    public function hideWhenCreating()
    {
        if (array_key_exists("store", $this->showOn)) {
            unset($this->showOn["store"]);
        }

        return $this;
    }

    public function hideWhenUpdating()
    {
        if (array_key_exists("edit", $this->showOn)) {
            unset($this->showOn["edit"]);
        }

        return $this;
    }

    public function onlyOnIndex()
    {
        $this->showOn = ["index"];

        return $this;
    }

    public function onlyOnDetails()
    {
        $this->showOn = ["index"];

        return $this;
    }

    public function onlyOnForms()
    {
        $this->showOn = ["store", "edit"];

        return $this;
    }

    public function exceptOnForms()
    {
        $this->showOn = ["index", "show"];

        return $this;
    }

    public function showOn(): array
    {
        return $this->showOn;
    }
}
