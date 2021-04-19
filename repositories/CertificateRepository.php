<?php

namespace nikserg\NepApi\repositories;

use nikserg\NepApi\Client;
use nikserg\NepApi\criteria\AbstractCriteria;
use nikserg\NepApi\models\Certificate;
use nikserg\NepApi\models\Organization;
use nikserg\NepApi\models\Person;

/**
 * Class CertificateRepository
 *
 * @method Certificate[] list(AbstractCriteria $criteria = null)
 * @method Certificate get(int $id)
 *
 * @package nikserg\NepApi\repositories
 */
class CertificateRepository extends AbstractRepository
{
    protected function getAction(): string
    {
        return Client::ACTION_CERTIFICATE;
    }

    protected function getModelClass(): string
    {
        return Certificate::class;
    }
}