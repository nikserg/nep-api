<?php

namespace nikserg\NepApi\models;

/**
 * Class Certificate
 *
 * Данные о выпускаемом сертификате
 *
 * @package nikserg\NepApi\models
 */
class Certificate extends AbstractModel
{

    /**
     * @var Person Человек, на которого выпускается сертификат
     */
    public Person $person;

    /**
     * @var UploadedDocument[] Список загруженных документов
     */
    public array $uploadedDocuments;

    /**
     * @var \DateTime
     */
    public \DateTime $createdAt;

    /**
     * @var \DateTime
     */
    public \DateTime $updatedAt;
}