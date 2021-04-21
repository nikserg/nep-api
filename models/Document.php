<?php

namespace nikserg\NepApi\models;

use JetBrains\PhpStorm\ExpectedValues;

/**
 * Class Document
 *
 * Тип загружаемого документа
 *
 * @package nikserg\NepApi\models
 */
class Document extends AbstractModel
{
    public const TYPE_CERTIFICATE = 'certificate';
    public const TYPE_PERSON = 'person';
    public const TYPE_ORGANIZATION = 'organization';

    /**
     * @var string Машинное название документа
     */
    public string $machineName;

    /**
     * @var string|null Описание документа
     */
    public ?string $description;

    /**
     * @var string Человекопонятное название документа
     */
    public string $name;

    /**
     * @var CertificateTemplate[]|null
     */
    public ?array $certificateTemplates;

    /**
     * @var string К чему относится документ: к сертификату или человеку
     */
    #[ExpectedValues([self::TYPE_CERTIFICATE, self::TYPE_PERSON])]
    public string $type;


    public function __construct(array $array)
    {
        $items = [];
        if (isset($array['certificateTemplates'])) {
            foreach ($array['certificateTemplates'] as $item) {
                $items[] = new CertificateTemplate($item);
            }
        }
        $array['certificateTemplates'] = $items;

        parent::__construct($array);
    }

}