<?php

namespace nikserg\NepApi\repositories;

use nikserg\NepApi\Client;
use nikserg\NepApi\criteria\DocumentCriteria;
use nikserg\NepApi\models\Document;


/**
 * Class PersonRepository
 *
 * @method Document[] list(DocumentCriteria $criteria = null)
 * @method Document get(int $id)
 * @package nikserg\NepApi\repositories
 */
class DocumentRepository extends AbstractRepository
{
    protected function getAction(): string
    {
        return Client::ACTION_DOCUMENT;
    }

    protected function getModelClass(): string
    {
        return Document::class;
    }
}