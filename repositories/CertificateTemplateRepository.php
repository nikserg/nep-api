<?php

namespace nikserg\NepApi\repositories;

use nikserg\NepApi\Client;
use nikserg\NepApi\criteria\CertificateTemplateCriteria;
use nikserg\NepApi\models\CertificateTemplate;

/**
 * Class CertificateTemplateRepository
 *
 * @method CertificateTemplate[] list(CertificateTemplateCriteria $criteria = null)
 * @method CertificateTemplate get(int $id)
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