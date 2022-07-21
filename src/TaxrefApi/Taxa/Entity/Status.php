<?php

namespace Taxref\TaxrefApi\Taxa\Entity;

class Status
{

    protected       BasicTaxon       $taxon;
    protected       ?string          $statusTypeName;
    protected       ?string          $statusTypeGroup;
    protected       ?string          $statusCode;
    protected       ?string          $statusName;
    protected       ?string          $statusRemarks;
    protected       ?string          $locationId;
    protected       ?string          $locationName;
    protected       ?string          $locationAdminLevel;
    protected       ?int             $sourceId;
    protected       ?string          $source;


    public function __construct(array $data)
    {
        $class = new \ReflectionClass($this);
        foreach ($class->getProperties() as $property) {
            if($property->getName() === 'taxon') {
                $this->taxon = new BasicTaxon($data['taxon']);
            } else {
                $this->{$property->getName()} = $data[$property->getName()] ?? null;
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
     * @return string
     */
    public function getStatusTypeName(): string
    {
        return $this->statusTypeName;
    }

    /**
     * @return string
     */
    public function getStatusTypeGroup(): string
    {
        return $this->statusTypeGroup;
    }

    /**
     * @return string
     */
    public function getStatusCode(): string
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getStatusName(): string
    {
        return $this->statusName;
    }

    /**
     * @return string
     */
    public function getStatusRemarks(): string
    {
        return $this->statusRemarks;
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @return string
     */
    public function getLocationName(): string
    {
        return $this->locationName;
    }

    /**
     * @return string
     */
    public function getLocationAdminLevel(): string
    {
        return $this->locationAdminLevel;
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


}