<?php

namespace nikserg\NepApi\models;

use JetBrains\PhpStorm\ExpectedValues;
use Stringable;

/**
 * Class Uc
 *
 * Информация об удостоверяющем центре
 *
 * @package nikserg\NepApi\models
 */
class Uc extends AbstractModel implements Stringable
{

    public const TYPE_AUTO = 'auto';
    public const TYPE_MANUAL = 'manual';

    public const TYPE_NAMES = [
        self::TYPE_AUTO   => 'Автоматический',
        self::TYPE_MANUAL => 'Ручной',
    ];

    /**
     * @var string Тип УЦ
     */
    #[ExpectedValues(self::TYPE_MANUAL, self::TYPE_AUTO)]
    public string $type;

    /**
     * @var string Название
     */
    public string $name;


    public function __toString()
    {
        return $this->name . ' (' . self::TYPE_NAMES[$this->type] . ')';
    }
}