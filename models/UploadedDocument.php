<?php

namespace nikserg\NepApi\models;

use DateTime;

/**
 * Class UploadedDocument
 *
 * Загруженный документ
 *
 * @package nikserg\NepApi\models
 */
class UploadedDocument extends AbstractModel
{
    /**
     * @var string Ссылка для скачивания документа (относительная).
     * Файл хранится на сервере API.
     * Например:
     *      "downloadLink": "/document/1/3053417159"
     */
    public string $downloadLink;


    /**
     * @var DateTime
     */
    public DateTime $createdAt;

    /**
     * @var DateTime
     */
    public DateTime $updatedAt;

    /**
     * @var Document Описание типа документа
     */
    public Document $document;

    public function __construct(array $array)
    {

        if (isset($array['updatedAt']) && $array['updatedAt']) {
            $array['updatedAt'] = new DateTime($array['updatedAt']);
        }
        if (isset($array['createdAt']) && $array['createdAt']) {
            $array['createdAt'] = new DateTime($array['createdAt']);
        }
        $array['document'] = new Document($array['document']);
        parent::__construct($array);
    }
}