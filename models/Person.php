<?php

namespace nikserg\NepApi\models;

use DateTime;

/**
 * Class Person
 *
 * Данные о человеке, владельце сертификата
 *
 * @package nikserg\NepApi\models
 */
class Person extends AbstractModel implements HasUploadedDocumentsInterface
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
     * @var DateTime
     */
    public DateTime $createdAt;

    /**
     * @var DateTime
     */
    public DateTime $updatedAt;

    /**
     * @var UploadedDocument[]
     */
    public array $uploadedDocuments;


    public function prepareForSave(): array
    {
        $array = parent::prepareForSave();
        unset($array['uploadedDocuments']);
        unset($array['updatedAt']);
        unset($array['createdAt']);

        return $array;
    }

    public function __construct(array $array)
    {
        if (isset($array['updatedAt']) && $array['updatedAt']) {
            $array['updatedAt'] = new DateTime($array['updatedAt']);
        }
        if (isset($array['createdAt']) && $array['createdAt']) {
            $array['createdAt'] = new DateTime($array['createdAt']);
        }
        $items = [];
        if (isset($array['uploadedDocuments'])) {
            foreach ($array['uploadedDocuments'] as $item) {
                $items[] = new UploadedDocument($item);
            }
        }
        $array['uploadedDocuments'] = $items;
        parent::__construct($array);
    }

    /**
     * ФИО владельца
     *
     *
     * @return string
     */
    public function getFio(): string
    {
        $pieces = [];
        if ($this->lastName) {
            $pieces[] = $this->lastName;
        }
        if ($this->firstName) {
            $pieces[] = $this->firstName;
        }
        if ($this->middleName) {
            $pieces[] = $this->middleName;
        }

        return implode(' ', $pieces);
    }

    public function __toString()
    {
        return $this->getFio();
    }


    /**
     * @return UploadedDocument[]
     */
    public function getUploadedDocuments(): array
    {
        return $this->uploadedDocuments;
    }
}