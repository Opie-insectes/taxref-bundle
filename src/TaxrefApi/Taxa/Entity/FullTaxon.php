<?php

namespace Taxref\TaxrefApi\Taxa\Entity;

class FullTaxon extends BasicTaxon
{

    protected       string      $authority;
    protected       string      $fullName;
    protected       string      $rankId;
    protected       string      $rankName;
    protected       string      $referenceName;
    protected       string      $frenchVernacularName;
    protected       string      $englishVernacularName;
    protected       string      $genusName;
    protected       string      $familyName;
    protected       string      $orderName;
    protected       string      $className;
    protected       string      $phylumName;
    protected       string      $kingdomName;
    protected       string      $vernacularGenusName;
    protected       string      $vernacularFamilyName;
    protected       string      $vernacularOrderName;
    protected       string      $vernacularClassName;
    protected       string      $vernacularPhylumName;
    protected       string      $vernacularKingdomName;
    protected       string      $vernacularGroup1;
    protected       string      $vernacularGroup2;
    protected       string      $vernacularGroup3;
    protected       string      $habitat;
    protected       string      $fr;
    protected       string      $gf;
    protected       string      $mar;
    protected       string      $gua;
    protected       string      $sb;
    protected       string      $spm;
    protected       string      $may;
    protected       string      $epa;
    protected       string      $reu;
    protected       string      $sa;
    protected       string      $ta;
    protected       string      $nc;
    protected       string      $wf;
    protected       string      $pf;
    protected       string      $cli;



    public function __construct(array $taxonData)
    {
        parent::__construct($taxonData);
        $class = new \ReflectionClass($this);
        $properties = $class->getProperties();
        foreach ($properties as $property) {
            $propertyName = $property->getName();
            if(isset($taxonData[$property->getName()])) {
                $this->{$propertyName} = $taxonData[$property->getName()];
            }
        }
    }

    /**
     * @return mixed
     */
    public function getAuthority()
    {
        return $this->authority;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @return mixed
     */
    public function getRankId()
    {
        return $this->rankId;
    }

    /**
     * @return mixed
     */
    public function getRankName()
    {
        return $this->rankName;
    }

    /**
     * @return mixed
     */
    public function getReferenceName()
    {
        return $this->referenceName;
    }

    /**
     * @return mixed
     */
    public function getFrenchVernacularName()
    {
        return $this->frenchVernacularName;
    }

    /**
     * @return mixed
     */
    public function getEnglishVernacularName()
    {
        return $this->englishVernacularName;
    }

    /**
     * @return mixed
     */
    public function getGenusName()
    {
        return $this->genusName;
    }

    /**
     * @return mixed
     */
    public function getFamilyName()
    {
        return $this->familyName;
    }

    /**
     * @return mixed
     */
    public function getOrderName()
    {
        return $this->orderName;
    }

    /**
     * @return mixed
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * @return mixed
     */
    public function getPhylumName()
    {
        return $this->phylumName;
    }

    /**
     * @return mixed
     */
    public function getKingdomName()
    {
        return $this->kingdomName;
    }

    /**
     * @return mixed
     */
    public function getVernacularGenusName()
    {
        return $this->vernacularGenusName;
    }

    /**
     * @return mixed
     */
    public function getVernacularFamilyName()
    {
        return $this->vernacularFamilyName;
    }

    /**
     * @return mixed
     */
    public function getVernacularOrderName()
    {
        return $this->vernacularOrderName;
    }

    /**
     * @return mixed
     */
    public function getVernacularClassName()
    {
        return $this->vernacularClassName;
    }

    /**
     * @return mixed
     */
    public function getVernacularPhylumName()
    {
        return $this->vernacularPhylumName;
    }

    /**
     * @return mixed
     */
    public function getVernacularKingdomName()
    {
        return $this->vernacularKingdomName;
    }

    /**
     * @return mixed
     */
    public function getVernacularGroup1()
    {
        return $this->vernacularGroup1;
    }

    /**
     * @return mixed
     */
    public function getVernacularGroup2()
    {
        return $this->vernacularGroup2;
    }

    /**
     * @return mixed
     */
    public function getVernacularGroup3()
    {
        return $this->vernacularGroup3;
    }

    /**
     * @return mixed
     */
    public function getHabitat()
    {
        return $this->habitat;
    }

    /**
     * @return mixed
     */
    public function getFr()
    {
        return $this->fr;
    }

    /**
     * @return mixed
     */
    public function getGf()
    {
        return $this->gf;
    }

    /**
     * @return mixed
     */
    public function getMar()
    {
        return $this->mar;
    }

    /**
     * @return mixed
     */
    public function getGua()
    {
        return $this->gua;
    }

    /**
     * @return mixed
     */
    public function getSb()
    {
        return $this->sb;
    }

    /**
     * @return mixed
     */
    public function getSpm()
    {
        return $this->spm;
    }

    /**
     * @return mixed
     */
    public function getMay()
    {
        return $this->may;
    }

    /**
     * @return mixed
     */
    public function getEpa()
    {
        return $this->epa;
    }

    /**
     * @return mixed
     */
    public function getReu()
    {
        return $this->reu;
    }

    /**
     * @return mixed
     */
    public function getSa()
    {
        return $this->sa;
    }

    /**
     * @return mixed
     */
    public function getTa()
    {
        return $this->ta;
    }

    /**
     * @return mixed
     */
    public function getNc()
    {
        return $this->nc;
    }

    /**
     * @return mixed
     */
    public function getWf()
    {
        return $this->wf;
    }

    /**
     * @return mixed
     */
    public function getPf()
    {
        return $this->pf;
    }

    /**
     * @return mixed
     */
    public function getCli()
    {
        return $this->cli;
    }


}