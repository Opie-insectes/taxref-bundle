<?php

namespace Taxref\TaxrefApi\Taxa\TaxonSources;


use Taxref\TaxrefApi\Bibliography\Entity\BibliographicSource;
use Taxref\TaxrefApi\Bibliography\TaxrefSource;
use Taxref\TaxrefApi\Taxa\Entity\Source;
use Taxref\TaxrefApi\Taxa\Taxa;

class TaxrefTaxonSources extends Taxa
{

    protected   ?array   $sources = null;

    public function __construct()
    {
        parent::__construct();
        $this->setName('taxonSources');
        $this->url .= '/%s/sources';
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
    public function getSources(int $taxonId): ?array
    {
        $this->searchFor($taxonId);
        if(!$this->sources) {
            $this->makeSources();
        }
        return $this->sources;
    }

    /**
     *
     */
    protected function makeSources(): void
    {
        foreach ($this->getResults() as $source) {
            $this->sources[] = new Source($source);
        }
    }

    /**
     * @return array
     */
    public function getDetailedSources(?array $sources): array
    {
        if(!$sources) {
            return [];
        }
        $sourcesList = [];
        $sourceGetter = new TaxrefSource();
        foreach ($sources as $source) {
            $sourcesList[] = $sourceGetter->getSource($source->getSourceId());
        }
        return $sourcesList;
    }

}