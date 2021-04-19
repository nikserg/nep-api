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
        protected Client $client
    ) {
    }

    /**
     * Посчитать количество моделей по критерию
     *
     *
     * @param AbstractCriteria|null $criteria
     * @return int
     * @throws NepApiMalformedResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \nikserg\NepApi\exception\NepApiException
     */
    public function count(AbstractCriteria $criteria = null): int
    {
        $data = $this->client->get($this->getAction() . '/count', $this->getParams($criteria));
        if (!isset($data['count'])) {
            throw new NepApiMalformedResponseException('Expected `count` key, got array ' . print_r($data, true));
        }

        return $data['count'];
    }

    private function getParams(AbstractCriteria $criteria = null): array
    {
        if ($criteria) {
            return $criteria->toArray();
        }
        return [];
    }

    /**
     * Получить список моделей по критерию
     *
     *
     * @param AbstractCriteria|null $criteria
     * @return AbstractModel[]
     * @throws NepApiMalformedResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \nikserg\NepApi\exception\NepApiException
     */
    public function list(AbstractCriteria $criteria = null): array
    {
        $data = $this->client->get($this->getAction(), $this->getParams($criteria));
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

    /**
     * Получить модель по ID
     *
     *
     * @param int $id
     * @return AbstractModel
     * @throws NepApiMalformedResponseException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \nikserg\NepApi\exception\NepApiException
     */
    public function get(int $id): AbstractModel
    {
        $data = $this->client->get($this->getAction() . '/' . $id);
        if (!isset($data['item'])) {
            throw new NepApiMalformedResponseException('Expected `item` key, got array ' . print_r($data, true));
        }
        $modelClassName = $this->getModelClass();
        return new $modelClassName($data['item']);
    }
}