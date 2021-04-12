<?php

namespace nikserg\NepApi\models;

class AbstractModel
{
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
}