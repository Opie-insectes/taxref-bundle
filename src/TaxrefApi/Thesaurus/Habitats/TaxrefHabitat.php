<?php

namespace Taxref\TaxrefApi\Thesaurus\Habitats;

use Taxref\TaxrefApi\Thesaurus\Entity\BiogeographicStatus;
use Taxref\TaxrefApi\Thesaurus\Entity\Habitat;
use Taxref\TaxrefClient;

class TaxrefHabitat extends TaxrefClient
{

    public function __construct()
    {
        parent::__construct();
        $this->name = 'habitats';
        $this->url .= '/habitats/%s';
    }

    public function getHabitat(string $habitatId): ?Habitat
    {
        $this->searchFor($habitatId);
        if(!$this->getResults()) {
            return null;
        }
        return new Habitat($this->getResults()) ?? null;
    }

}