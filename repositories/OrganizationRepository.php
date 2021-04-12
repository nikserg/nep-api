<?php

namespace nikserg\NepApi\repositories;

use nikserg\NepApi\Client;
use nikserg\NepApi\models\Organization;

class OrganizationRepository extends AbstractRepository
{
    protected function getAction(): string
    {
        return Client::ACTION_ORGANIZATION;
    }

    protected function getModelClass(): string
    {
        return Organization::class;
    }
}