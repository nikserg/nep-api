<?php

namespace nikserg\NepApi\repositories;

use nikserg\NepApi\Client;
use nikserg\NepApi\criteria\AbstractCriteria;
use nikserg\NepApi\exception\NepApiMalformedResponseException;
use nikserg\NepApi\models\AbstractModel;

abstract class AbstractRepository
{
    protected abstract function getAction(): string;

    protected abstract function getModelClass(): string;

    public function __construct(
        protected Client $client,
        protected AbstractCriteria $criteria
    ) {
    }

    public function count()
    {
        $data = $this->client->get($this->getAction() . '/count', $this->criteria->toArray());
        if (!isset($data['count'])) {
            throw new NepApiMalformedResponseException('Expected `count` key, got array ' . print_r($data, true));
        }

        return $data['count'];
    }

    /**
     * @return AbstractModel[]
     * @throws NepApiMalformedResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \nikserg\NepApi\exception\NepApiException
     */
    public function list(): array
    {
        $data = $this->client->get($this->getAction(), $this->criteria->toArray());
        if (!isset($data['list'])) {
            throw new NepApiMalformedResponseException('Expected `list` key, got array ' . print_r($data, true));
        }
        $list = $data['list'];
        $return = [];
        $modelClassName = $this->getModelClass();
        foreach ($list as $item) {
            $return[] = new $modelClassName($item);
        }

        return $return;
    }
}