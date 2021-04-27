<?php

namespace nikserg\NepApi\repositories;

use nikserg\NepApi\Client;
use nikserg\NepApi\criteria\UcCriteria;
use nikserg\NepApi\models\Uc;

/**
 * Class OrganizationRepository
 *
 *
 * @method Uc[] list(UcCriteria $criteria = null)
 * @method Uc get(int $id)
 * @package nikserg\NepApi\repositories
 */
class UcRepository extends AbstractRepository
{

    protected function getAction(): string
    {
        return Client::ACTION_UC;
    }

    protected function getModelClass(): string
    {
        return Uc::class;
    }
}