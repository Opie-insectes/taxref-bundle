<?php

namespace Taxref\TaxrefApi\Status\Types;

use Taxref\TaxrefApi\Status\Entity\StatusType;
use Taxref\TaxrefApi\Status\Status;

class TaxrefTypes extends Status
{

    protected ?array $types = null;

    public function __construct()
    {
        parent::__construct();
        $this->name = 'statusTypes';
        $this->url .= '/types';
    }

    public function getTypes(): ?array
    {
        foreach ($this->getResults() as $result) {
            $this->types[] = new StatusType($result);
        }
        return $this->types;
    }

    public function getTypesArray(): array
    {
        $types = [];
        foreach ($this->getResults() as $result) {
            $type = new StatusType($result);
            $types[$type->getId()] = $type;
        }
        return $types;
    }





}