<?php

namespace nikserg\NepApi\models;

use DateTime;

/**
 * Class Certificate
 *
 * Данные о выпускаемом сертификате
 *
 * @package nikserg\NepApi\models
 */
class Certificate extends AbstractModel
{

    /**
     * @var Person Человек, на которого выпускается сертификат
     */
    public Person $person;

    /**
     * @var UploadedDocument[] Список загруженных документов
     */
    public array $uploadedDocuments;

    /**
     * @var CertificateTemplate Шаблон сертификата
     */
    public CertificateTemplate $certificateTemplate;

    /**
     * @var Organization Организация, на которую выпускается сертификат
     */
    public Organization $organization;

    /**
     * @var DateTime
     */
    public DateTime $createdAt;

    /**
     * @var DateTime
     */
    public DateTime $updatedAt;

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
        $array['updatedAt'] = new DateTime($array['updatedAt']);
        $array['createdAt'] = new DateTime($array['createdAt']);
        $items = [];
        foreach ($array['uploadedDocuments'] as $item) {
            $items[] = new UploadedDocument($item);
        }
        $array['uploadedDocuments'] = $items;
        $array['person'] = new Person($array['person']);
        $array['organization'] = new Organization($array['organization']);
        $array['certificateTemplate'] = new CertificateTemplate($array['certificateTemplate']);
        parent::__construct($array);
    }
}