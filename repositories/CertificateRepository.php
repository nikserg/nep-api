<?php

namespace nikserg\NepApi\repositories;

use nikserg\NepApi\Client;
use nikserg\NepApi\criteria\CertificateCriteria;
use nikserg\NepApi\models\Certificate;

/**
 * Class CertificateRepository
 *
 * @method Certificate[] list(CertificateCriteria $criteria = null)
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