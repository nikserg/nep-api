<?php

namespace nikserg\NepApi\repositories;

use nikserg\NepApi\Client;
use nikserg\NepApi\models\Organization;
use nikserg\NepApi\models\Person;

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