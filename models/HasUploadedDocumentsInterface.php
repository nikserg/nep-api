<?php

namespace nikserg\NepApi\models;


interface HasUploadedDocumentsInterface
{
    /**
     * @return UploadedDocument[]
     */
    public function getUploadedDocuments(): array;

}