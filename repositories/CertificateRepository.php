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
    use DocumentsUploadTrait;

    /**
     * @param int $id
     * @param int $newStatus
     */
    public function setStatus(int $id, int $newStatus)
    {
        $this->client->post($this->getAction() . '/' . $id . '/status', ['status' => $newStatus]);
    }

    protected function getAction(): string
    {
        return Client::ACTION_CERTIFICATE;
    }

    protected function getModelClass(): string
    {
        return Certificate::class;
    }
}