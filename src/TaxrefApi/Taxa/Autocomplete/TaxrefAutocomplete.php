<?php

namespace Taxref\TaxrefApi\Taxa\Autocomplete;

use Taxref\TaxrefApi\Taxa\Entity\BasicTaxon;
use Taxref\TaxrefApi\Taxa\Taxa;

class TaxrefAutocomplete extends Taxa
{

    private ?array  $taxa         = null;
    private ?array  $where        = null;
    private bool    $hasBeenReset = false;


    public function __construct()
    {
        parent::__construct();
        $this->url .= '/autocomplete?term=%s';
    }

    public function reset(): void
    {
        $this->url     = '/' . $this->name . '/autocomplete?term=%s';
        $this->taxa    = null;
        $this->results = null;
        $this->hasBeenReset = true;
    }

    public function where($field, $value): self
    {
        $this->where = [
            'field' => $field,
            'value' => $value
        ];
        return $this;
    }

    /**
     * @param $rank
     */
    public function addTaxonomicRank($rank): self
    {
        $this->url .= sprintf('&taxonomicRanks=%s', $rank);
        return $this;
    }

    /**
     * @param string $territory
     */
    public function addTerritories(string $territory): self
    {
        $this->url .= sprintf('&territories=%s', $territory);
        return $this;
    }

    /**
     * @param string $domain
     */
    public function addDomain(string $domain): self
    {
        $this->url .= sprintf('&domain=%s', $domain);
        return $this;
    }

    /**
     * @return bool
     */
    public function hasSingleResult(): bool
    {
        if ($this->hasResult()) {
            return count($this->results) === 1;
        }
        return false;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }


    /**
     * @param string $taxon
     * Taxon can be a species, a gender or all other classification entity : "Baleine à bosse", "baleine"
     * @param bool $onlyReference
     * Pass it to true if you only want species that are reference : id === referenceId
     * @return array
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @throws \Taxref\Exceptions\MalformedUrlException
     */
    public function getTaxa(string $taxon, $onlyReference = false): array
    {
        if (!$this->hasBeenRequested() || $this->hasBeenReset) {
            $this->searchFor($taxon);
            $this->hasBeenReset = false;
        }
        if ($this->hasResult()) {
            $this->taxa = [];
            if ($this->results) {
                if ($onlyReference) {
                    foreach ($this->results as $taxon) {
                        if(!$this->where && $taxon['id'] === $taxon['referenceId']) {
                            $this->taxa[] = new BasicTaxon($taxon);
                        }
                        if($this->where && $taxon[$this->where['field']] === $this->where['value'] && $taxon['id'] === $taxon['referenceId']) {
                            $this->taxa[] = new BasicTaxon($taxon);
                        }
                    }
                } else {
                    foreach ($this->results as $taxon) {
                        if(!$this->where) {
                            $this->taxa[] = new BasicTaxon($taxon);
                        } else {
                            if ($taxon[$this->where['field']] === $this->where['value']) {
                                $this->taxa[] = new BasicTaxon($taxon);
                            }
                        }
                    }
                }
                return $this->taxa;
            }
        }
        return [];
    }

    /**
     * @param string $taxon
     * @return BasicTaxon|null
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @throws \Taxref\Exceptions\MalformedUrlException
     */
    public function getTaxon(string $taxon): ?BasicTaxon
    {
        if (!$this->hasBeenRequested()) {
            $this->searchFor($taxon);
        }
        if ($this->hasSingleResult()) {
            return new BasicTaxon($this->results[0]) ?? null;
        }
        return null;
    }
}
