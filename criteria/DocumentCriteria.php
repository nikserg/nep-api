<?php

namespace nikserg\NepApi\criteria;

use JetBrains\PhpStorm\ExpectedValues;
use nikserg\NepApi\models\Document;

/**
 * Class DocumentCriteria
 *
 * @package nikserg\NepApi\criteria
 */
class DocumentCriteria extends AbstractCriteria
{
    #[ExpectedValues(Document::TYPE_PERSON, Document::TYPE_CERTIFICATE, Document::TYPE_ORGANIZATION)]
    public string $type;

    /**
     * @param string $type
     * @return $this
     */
    public function type(string $type): static
    {
        $this->type = $type;

        return $this;
    }
}