<?php

namespace Taxref\TaxrefApi\Taxa\Entity;

class BasicTaxon
{

    protected       int         $id;
    protected       string      $scientificName;
    protected       string      $fullNameHtml;
    protected       int         $referenceId;
    protected       int         $parentId;
    protected       string      $referenceNameHtml;

    public function __construct(array $taxonData)
    {
        $this->id                = (int)$taxonData['id'];
        $this->scientificName    = $taxonData['scientificName'];
        $this->fullNameHtml      = $taxonData['fullNameHtml'];
        $this->referenceId       = (int)$taxonData['referenceId'];
        $this->parentId          = (int)$taxonData['parentId'];
        $this->referenceNameHtml = $taxonData['referenceNameHtml'];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getScientificName()
    {
        return $this->scientificName;
    }

    /**
     * @return mixed
     */
    public function getFullNameHtml()
    {
        return $this->fullNameHtml;
    }

    /**
     * @return mixed
     */
    public function getReferenceId()
    {
        return $this->referenceId;
    }

    /**
     * @return mixed
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * @return mixed
     */
    public function getReferenceNameHtml()
    {
        return $this->referenceNameHtml;
    }


    public function isReferenceTaxon(): bool
    {
        return $this->id === $this->referenceId;
    }



}