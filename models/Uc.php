<?php

namespace nikserg\NepApi\models;

use JetBrains\PhpStorm\ExpectedValues;

/**
 * Class Uc
 *
 * Информация об удостоверяющем центре
 *
 * @package nikserg\NepApi\models
 */
class Uc extends AbstractModel
{

    public const TYPE_AUTO = 'auto';
    public const TYPE_MANUAL = 'manual';

    /**
     * @var string Тип УЦ
     */
    #[ExpectedValues(self::TYPE_MANUAL, self::TYPE_AUTO)]
    public string $type;

    /**
     * @var string Название
     */
    public string $name;
}