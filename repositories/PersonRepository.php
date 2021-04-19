<?php

namespace nikserg\NepApi\repositories;

use nikserg\NepApi\Client;
use nikserg\NepApi\models\Organization;
use nikserg\NepApi\models\Person;

/**
 * Class PersonRepository
 *
 * @method Person[] list()
 * @method Person get(int $id)
 * @package nikserg\NepApi\repositories
 */
class PersonRepository extends AbstractRepository
{
    protected function getAction(): string
    {
        return Client::ACTION_PERSON;
    }

    protected function getModelClass(): string
    {
        return Person::class;
    }
}