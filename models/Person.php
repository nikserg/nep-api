<?php

namespace nikserg\NepApi\models;

/**
 * Class Person
 *
 * Данные о человеке, владельце сертификата
 *
 * @package nikserg\NepApi\models
 */
class Person extends AbstractModel
{
    /**
     * @var string|null
     */
    public ?string $firstName;

    /**
     * @var string|null
     */
    public ?string $lastName;

    /**
     * @var string|null
     */
    public ?string $middleName;

    /**
     * @var string|null
     */
    public ?string $snils;

    /**
     * @var \DateTime
     */
    public \DateTime $createdAt;

    /**
     * @var \DateTime
     */
    public \DateTime $updatedAt;

    /**
     * @var UploadedDocument[]
     */
    public array $uploadedDocuments;
}