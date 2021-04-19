<?php

namespace nikserg\NepApi\models;

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
     * @var Document Описание типа документа
     */
    public Document $document;

    public function __construct(array $array)
    {
        $array['document'] = new Document($array['document']);
        parent::__construct($array);
    }
}