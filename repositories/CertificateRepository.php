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
     * Одобрить выпуск сертификата
     *
     *
     * @param int $id
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \nikserg\NepApi\exception\NepApiException
     * @throws \nikserg\NepApi\exception\NepApiMalformedResponseException
     */
    public function launch(int $id)
    {

        $this->client->get($this->getAction() . '/' . $id . '/launch');
    }

    /**
     * Отправить запрос на генерацию
     *
     *
     * @param int    $id
     * @param string $requestContent
     */
    public function sendRequest(int $id, string $requestContent): void
    {
        $this->client->post($this->getAction() . '/' . $id . '/request', ['request' => $requestContent,]);
    }


    /**
     * Отправить выпущенный сертификат
     *
     *
     * @param int    $id
     * @param string $certificateContent
     */
    public function sendCertificate(int $id, string $certificateContent): void
    {
        $this->client->post($this->getAction() . '/' . $id . '/certificate', ['certificate' => $certificateContent,]);
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