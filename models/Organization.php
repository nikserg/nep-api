<?php

namespace nikserg\NepApi\models;

/**
 * Class Organization
 *
 * Данные об организации
 *
 * @package nikserg\NepApi\models
 */
class Organization extends AbstractModel
{
    /**
     * @var string Название организации
     */
    public string $name;

    /**
     * @var string|null ИНН организации
     */
    public ?string $inn;

    public function __toString()
    {
        return $this->name;
    }


    public function getDocumentType(): string
    {
        return Document::TYPE_ORGANIZATION;
    }
}