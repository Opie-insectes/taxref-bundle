<?php

namespace Taxref\TaxrefApi\Bibliography;

use Taxref\TaxrefApi\Bibliography\Entity\BibliographicSource;
use Taxref\TaxrefClient;

class TaxrefSource extends TaxrefClient
{

    public function __construct()
    {
        parent::__construct();
        $this->url .= '/sources/%s';
    }

    public function getSource(int $sourceId): ?BibliographicSource
    {
        $this->searchFor($sourceId);
        if(!$this->getResults()) {
            return null;
        }
        return new BibliographicSource($this->getResults()) ?? null;
    }


}