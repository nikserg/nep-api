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
}