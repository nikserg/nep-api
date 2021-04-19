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


    public function __construct(array $array)
    {
        $array['updatedAt'] = new \DateTime($array['updatedAt']);
        $array['createdAt'] = new \DateTime($array['createdAt']);
        $items = [];
        foreach ($array['uploadedDocuments'] as $item) {
            $items[] = new UploadedDocument($item);
        }
        $array['uploadedDocuments'] = $items;
        parent::__construct($array);
    }
}