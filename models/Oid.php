<?php
namespace nikserg\NepApi\models;

/**
 * Class Oid
 *
 * ОИД - часть наполнения сертификата
 *
 * @package nikserg\NepApi\models
 */
class Oid extends AbstractModel {

    /**
     * @var string Например, "Базовый 1"
     */
    public string $name;
    /**
     * @var string Например, "1.2.3.4"
     */
    public string $value;
}