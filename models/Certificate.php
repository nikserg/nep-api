<?php

namespace nikserg\NepApi\models;

use DateTime;
use JetBrains\PhpStorm\Pure;

/**
 * Class Certificate
 *
 * Данные о выпускаемом сертификате
 *
 * @package nikserg\NepApi\models
 */
class Certificate extends AbstractModel implements HasUploadedDocumentsInterface
{
    public const STATUS_INIT = 0; //Заявка создана
    public const STATUS_LAUNCH = 500; //Выпуск одобрен, ожидание генерации клиентом
    public const STATUS_SENDED = 700; //Запрос на создание сертификата отправлен, ожидание выпуска на УЦ
    public const STATUS_DONE = 1000; //Сертификат выпущен


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
     * @var Uc|null Информация об УЦ
     */
    public ?Uc $uc;

    /**
     * @var DateTime
     */
    public DateTime $createdAt;

    /**
     * @var DateTime
     */
    public DateTime $updatedAt;

    /**
     * @var int
     */
    public int $status;

    /**
     * @var string
     */
    public string $statusName;

    /**
     * @var string|null Содержимое сертификата, если он выпущен
     */
    public ?string $certificateContent;


    /**
     * @var string|null Содержимое запроса, если он отправлен
     */
    public ?string $requestContent;

    /**
     * @var string
     */
    public string $token;

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
        if ($this->uc) {
            $data['uc'] = $this->uc->id;
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
        if (isset($array['person'])) {
            $array['person'] = new Person($array['person']);
        }
        if (isset($array['organization'])) {
            $array['organization'] = new Organization($array['organization']);
        }
        if (isset($array['certificateTemplate'])) {
            $array['certificateTemplate'] = new CertificateTemplate($array['certificateTemplate']);
        }
        if (isset($array['uc'])) {
            $array['uc'] = new Uc($array['uc']);
        }
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

    /**
     * @param int    $id
     * @param string $token
     * @return string
     */
    public static function makeExternalAccessUrl(int $id, string $token): string
    {
        return '/certificate/' . $id . '?modelId=' . $id . '&modelClass=Certificate&token=' . $token;
    }

    /**
     * Ссылка для получения информации по сертификату без авторизации
     *
     * @return string
     */
    #[Pure] public function getExternalAccessUrl(): string
    {
        return static::makeExternalAccessUrl($this->id, $this->token);
    }
}