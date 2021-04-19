<?php

namespace nikserg\NepApi\repositories;

use nikserg\NepApi\Client;
use nikserg\NepApi\models\CertificateTemplate;
use nikserg\NepApi\models\Organization;
use nikserg\NepApi\models\Person;

/**
 * Class CertificateTemplateRepository
 *
 * @method CertificateTemplate[] list()
 * @package nikserg\NepApi\repositories
 */
class CertificateTemplateRepository extends AbstractRepository
{
    protected function getAction(): string
    {
        return Client::ACTION_CERTIFICATE_TEMPLATE;
    }

    protected function getModelClass(): string
    {
        return CertificateTemplate::class;
    }
}