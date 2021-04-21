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
class Certificate extends AbstractModel implements HasUploadedDocumentsInterface
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
        $data = [
            'certificate_template' => $this->certificateTemplate->id,
            'organization'         => $this->organization->id,
            'person'               => $this->person->id,
        ];
        if ($this->id) {
            $data['id'] = $this->id;
        }

        return $data;
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
        $array['person'] = new Person($array['person']);
        $array['organization'] = new Organization($array['organization']);
        $array['certificateTemplate'] = new CertificateTemplate($array['certificateTemplate']);
        parent::__construct($array);
    }

    /**
     * @return UploadedDocument[]
     */
    public function getUploadedDocuments(): array
    {
        return $this->uploadedDocuments;
    }

    public function getDocumentType(): string
    {
        return Document::TYPE_CERTIFICATE;
    }
}