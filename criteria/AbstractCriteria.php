<?php

namespace nikserg\NepApi\criteria;

use JetBrains\PhpStorm\ArrayShape;

abstract class AbstractCriteria
{
    public int $limit = 10;
    public int $offset = 0;

    public function limit($limit)
    {
        $this->limit = $limit;

        return $this;
    }

    public function offset($offset)
    {
        $this->offset = $offset;

        return $this;
    }

    public function toArray(): array
    {
        return (array)$this;
    }
}