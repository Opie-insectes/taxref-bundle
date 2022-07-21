<?php

namespace Taxref\TaxrefApi\Thesaurus\Habitats;

use Taxref\TaxrefApi\Thesaurus\Entity\Habitat;
use Taxref\TaxrefClient;

class TaxrefHabitats extends TaxrefClient
{

    protected ?array $habitats = null;

    public function __construct()
    {
        parent::__construct();
        $this->name = 'habitats';
        $this->url .= '/habitats';
    }

    public function getHabitats(): ?array
    {
        if(!$this->habitats) {
            $this->searchFor();
        }
        foreach ($this->getResults() as $result) {
            $this->habitats[] = new Habitat($result);
        }
        return $this->habitats;
    }

    public function getHabitatsArray(): array
    {
        $habitats = [];
        foreach ($this->getResults() as $result) {
            $habitat = new Habitat($result);
            $habitats[$habitat->getId()] = $habitat;
        }
        return $habitats;
    }

}