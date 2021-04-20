<?php

namespace nikserg\NepApi;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use nikserg\NepApi\exception\NepApiException;
use nikserg\NepApi\exception\NepApiMalformedResponseException;

class Client
{
    public const ACTION_ORGANIZATION = 'organization';
    public const ACTION_PERSON = 'person';
    public const ACTION_CERTIFICATE = 'certificate';
    public const ACTION_CERTIFICATE_TEMPLATE = 'certificate-template';
    public const ACTION_DOCUMENT = 'document';


    protected \GuzzleHttp\Client $client;

    public function __construct($apiKey, $host = 'https://crm.uc-itcom.ru',)
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri'                  => $host,
            RequestOptions::VERIFY      => false,
            RequestOptions::HTTP_ERRORS => false,
            RequestOptions::HEADERS     => [
                'Authorization' => 'Bearer ' . $apiKey,
            ],
        ]);
    }

    /**
     * @param string $action
     * @param array  $params
     * @return array
     * @throws GuzzleException
     * @throws NepApiException
     * @throws NepApiMalformedResponseException
     */
    public function get(string $action, $params = []): array
    {
        return $this->doMethod('get', $action, ['query' => $params]);
    }

    public function post(string $action, $params = []): array
    {
        return $this->doMethod('post', $action, ['form_params' => $params]);
    }

    public function doMethod(string $method, string $action, $options): array
    {
        $response = $this->client->$method($action, $options);
        $decoded = json_decode($response->getBody()->getContents(), true);
        if (!isset($decoded['code'])) {
            throw new NepApiMalformedResponseException('Malformed or no response from ' . $action . ': ' . $response->getBody()->getContents());
        }
        if ($decoded['code']) {
            throw new NepApiException('Error while doing ' . $method . ' ' . $action . ': ' . $decoded['message'] . '. Request parameters: ' . print_r($options,
                    true), $decoded['code']);
        }

        return $decoded;
    }


}