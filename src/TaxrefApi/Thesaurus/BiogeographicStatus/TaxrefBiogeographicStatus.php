<?php

namespace Taxref\TaxrefApi\Thesaurus\BiogeographicStatus;

use Taxref\TaxrefApi\Thesaurus\Entity\BiogeographicStatus;
use Taxref\TaxrefClient;

class TaxrefBiogeographicStatus extends TaxrefClient
{


    public function __construct()
    {
        parent::__construct();
        $this->name = 'biogeographicStatus';
        $this->url .= '/biogeographicStatus/%s';
    }

    public function getType(string $statusId): ?BiogeographicStatus
    {
        if(!$this->getResults()) {
            return null;
        }
        $this->searchFor($statusId);
        return new BiogeographicStatus($this->getResults()) ?? null;
    }

}