<?php

namespace nikserg\NepApi\repositories;

use nikserg\NepApi\Client;
use nikserg\NepApi\exception\NepApiMalformedResponseException;
use nikserg\NepApi\models\UploadedDocument;

/**
 * Trait DocumentsUpload
 *
 * @property Client $client
 * @package nikserg\NepApi\repositories
 */
trait DocumentsUploadTrait
{
    /**
     * @param int    $id
     * @param string $documentMachineName
     * @param        $fileContent
     * @return UploadedDocument
     * @throws NepApiMalformedResponseException
     */
    public function uploadFile(int $id, string $documentMachineName, $fileContent): UploadedDocument
    {
        $data = $this->client->postMultipart($this->getAction() . '/' . $id . '/document/' . $documentMachineName, [
            [
                'name'     => 'file',
                'contents' => $fileContent,
                'filename' => 'file',
            ],
        ]);
        if (!isset($data['item'])) {
            throw new NepApiMalformedResponseException('Expected `item` key, got array ' . print_r($data, true));
        }

        return new UploadedDocument($data['item']);
    }

    protected abstract function getAction(): string;
}