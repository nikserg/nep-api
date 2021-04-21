<?php

namespace nikserg\NepApi\models;

/**
 * Class Organization
 *
 * Данные об организации
 *
 * @package nikserg\NepApi\models
 */
class Organization extends AbstractModel implements HasUploadedDocumentsInterface
{
    /**
     * @var string Название организации
     */
    public string $name;

    /**
     * @var string|null ИНН организации
     */
    public ?string $inn;


    /**
     * @var UploadedDocument[]
     */
    public array $uploadedDocuments;

    public function __toString()
    {
        return $this->name;
    }


    public function getDocumentType(): string
    {
        return Document::TYPE_ORGANIZATION;
    }


    public function __construct(array $array)
    {
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
     * @return UploadedDocument[]
     */
    public function getUploadedDocuments(): array
    {
        return $this->uploadedDocuments;
    }


    public function prepareForSave(): array
    {
        $array = parent::prepareForSave();
        unset($array['uploadedDocuments']);

        return $array;
    }
}