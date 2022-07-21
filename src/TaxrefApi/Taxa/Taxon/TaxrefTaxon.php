<?php

namespace Taxref\TaxrefApi\Taxa\Taxon;

use Taxref\TaxrefApi\Taxa\Entity\FullTaxon;
use Taxref\TaxrefApi\Taxa\Taxa;

class TaxrefTaxon extends Taxa
{

    public function __construct()
    {
        parent::__construct();
        $this->url .= '/%s';
    }

    public function getTaxon(int $taxonId): ?FullTaxon
    {
        $this->searchFor($taxonId);
        if($this->results) {
            return new FullTaxon($this->results);
        }
        return null;
    }

}