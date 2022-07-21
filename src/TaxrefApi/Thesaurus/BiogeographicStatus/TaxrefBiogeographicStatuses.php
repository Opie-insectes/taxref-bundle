<?php

namespace Taxref\TaxrefApi\Thesaurus\BiogeographicStatus;

use Taxref\TaxrefApi\Thesaurus\Entity\BiogeographicStatus;
use Taxref\TaxrefClient;

class TaxrefBiogeographicStatuses extends TaxrefClient
{

    protected ?array $biogeographicStatuses = null;

    public function __construct()
    {
        parent::__construct();
        $this->name = 'biogeographicStatus';
        $this->url .= '/biogeographicStatus';
    }

    public function getBiogeographicStatuses(): ?array
    {
        foreach ($this->getResults() as $result) {
            $this->biogeographicStatuses[] = new BiogeographicStatus($result);
        }
        return $this->biogeographicStatuses;
    }

    public function getBiogeographicStatusesArray(): array
    {
        $biogeographicStatuses = [];
        foreach ($this->getResults() as $result) {
            $status = new BiogeographicStatus($result);
            $biogeographicStatuses[$status->getId()] = $status;
        }
        return $biogeographicStatuses;
    }

}