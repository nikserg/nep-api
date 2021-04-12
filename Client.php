<?php

namespace nikserg\NepApi;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\RequestOptions;
use nikserg\NepApi\exception\NepApiException;
use nikserg\NepApi\exception\NepApiMalformedResponseException;
use Psr\Http\Message\ResponseInterface;

class Client
{
    public const ACTION_ORGANIZATION = 'organization';


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
        $response = $this->client->get($action, ['query' => $params]);
        $decoded = json_decode($response->getBody()->getContents(), true);
        if (!isset($decoded['code'])) {
            throw new NepApiMalformedResponseException('Malformed or no response from ' . $action . ': ' . $response->getBody()->getContents());
        }
        if ($decoded['code']) {
            throw new NepApiException('Error while getting ' . $action . ': ' . $decoded['message'], $decoded['code']);
        }

        return $decoded;
    }

}