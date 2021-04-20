<?php

namespace nikserg\NepApi\models;

abstract class AbstractModel
{
    public int $id;

    /**
     * AbstractModel constructor.
     *
     * @param array $array
     */
    public function __construct(array $array)
    {
        foreach ($array as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function prepareForSave(): array
    {
        return (array)$this;
    }
}