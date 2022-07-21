<?php

namespace Taxref\TaxrefApi\Taxa\Classification;

use Taxref\TaxrefApi\Taxa\Entity\FullTaxon;
use Taxref\TaxrefApi\Taxa\Taxa;

class TaxrefClassification extends Taxa
{

    protected   ?array  $classificationElements = null;
    protected   ?array  $classification         = null;

    public function __construct()
    {
        parent::__construct();
        $this->url .= '/%s/classification';
    }

    /**
     *
     */
    protected function makeClassification(): void
    {
        foreach ($this->getResults() as $element) {
            $taxon = new FullTaxon($element);
            $this->classificationElements[] = $taxon;
            $this->classification[$taxon->getRankName()] = $taxon->getScientificName();
        }
    }

    /**
     * @param int $taxonId
     * @return array|null
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @throws \Taxref\Exceptions\MalformedUrlException
     */
    public function getClassificationElements(int $taxonId): ?array
    {
        if(!$this->classificationElements) {
            $this->searchFor($taxonId);
            $this->makeClassification();
        }
        return $this->classificationElements ?? null;
    }

    /**
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Taxref\Exceptions\MalformedUrlException
     */
    public function getClassification(int $taxonId): ?array
    {
        if(!$this->classification) {
            $this->searchFor($taxonId);
            $this->makeClassification();
        }
        return $this->classification ?? null;
    }


}