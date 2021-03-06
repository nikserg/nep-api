<?php

namespace nikserg\NepApi\repositories;

use nikserg\NepApi\Client;
use nikserg\NepApi\criteria\OrganizationCriteria;
use nikserg\NepApi\models\Organization;

/**
 * Class OrganizationRepository
 *
 *
 * @method Organization[] list(OrganizationCriteria $criteria = null)
 * @method Organization get(int $id)
 * @package nikserg\NepApi\repositories
 */
class OrganizationRepository extends AbstractRepository
{
    use DocumentsUploadTrait;

    protected function getAction(): string
    {
        return Client::ACTION_ORGANIZATION;
    }

    protected function getModelClass(): string
    {
        return Organization::class;
    }
}