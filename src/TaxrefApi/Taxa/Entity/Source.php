<?php

namespace Taxref\TaxrefApi\Taxa\Entity;

class Source
{

    protected   BasicTaxon      $taxon;
    protected   int             $sourceId;
    protected   string          $source;
    protected   string          $page;
    protected   string          $pageUrl;
    protected   string          $sopurceUse;

    public function __construct(array $data)
    {
        $class = new \ReflectionClass($this);
        foreach ($class->getProperties() as $property) {
            $propertyName = $property->getName();
            if($propertyName === 'taxon') {
                $this->taxon = new BasicTaxon($data['taxon']);
            }
            if($propertyName !== 'taxon' && isset($data[$propertyName])) {
                $this->{$propertyName} = $data[$propertyName];
            }
        }
    }

    /**
     * @return BasicTaxon
     */
    public function getTaxon(): BasicTaxon
    {
        return $this->taxon;
    }

    /**
     * @return int
     */
    public function getSourceId(): int
    {
        return $this->sourceId;
    }

    /**
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @return string
     */
    public function getPage(): string
    {
        return $this->page;
    }

    /**
     * @return string
     */
    public function getPageUrl(): string
    {
        return $this->pageUrl;
    }

    /**
     * @return string
     */
    public function getSopurceUse(): string
    {
        return $this->sopurceUse;
    }



}