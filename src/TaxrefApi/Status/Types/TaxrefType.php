<?php

namespace Taxref\TaxrefApi\Status\Types;

use Taxref\TaxrefApi\Status\Entity\StatusType;

class TaxrefType extends TaxrefTypes
{
    public function __construct()
    {
        parent::__construct();
        $this->url .= '/%s';
    }

    public function getType(string $typeId): ?StatusType
    {
        if(!$this->getResults()) {
            return null;
        }
        $this->searchFor($typeId);
        return new StatusType($this->getResults()) ?? null;
    }
}