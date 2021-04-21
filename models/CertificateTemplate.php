<?php

namespace nikserg\NepApi\models;

/**
 * Class CertificateTemplate
 *
 * Шаблон сертификата
 *
 * @package nikserg\NepApi\models
 */
class CertificateTemplate extends AbstractModel
{

    /**
     * @var string Название шаблона
     */
    public string $name;

    /**
     * @var Oid[] Включаемые в сертификат ОИДы
     */
    public array $oids;

    /**
     * @var int Срок действия сертификата в месяцах
     */
    public int $period;

    /**
     * @var Document[] Требуемые для выпуска документы
     */
    public array $documents;


    public function __construct(array $array)
    {
        $items = [];
        foreach ($array['oids'] as $item) {
            $items[] = new Oid($item);
        }
        $array['oids'] = $items;

        $items = [];
        if (isset($array['documents'])) {
            foreach ($array['documents'] as $item) {
                $items[] = new Document($item);
            }
        }
        $array['documents'] = $items;
        parent::__construct($array);
    }


    public function __toString()
    {
        return $this->name;
    }
}