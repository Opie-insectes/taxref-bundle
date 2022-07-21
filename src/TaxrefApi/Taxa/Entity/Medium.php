<?php

namespace Taxref\TaxrefApi\Taxa\Entity;

class Medium
{

    protected       int             $id;
    protected       BasicTaxon      $taxon;
    protected       ?string          $copyright;
    protected       ?string          $title;
    protected       ?string          $licence;
    protected       ?string          $mimeType;
    protected       ?string          $file;
    protected       ?string          $thumbnail;

    public function __construct(array $data)
    {

        $this->id = $data['id'];
        $this->taxon = new BasicTaxon($data['taxon']);
        $this->copyright = $data['copyright'];
        $this->title = $data['title'];
        $this->licence = $data['licence'];
        $this->mimeType = $data['mimeType'];
        $this->file = $data['_links']['file']['href'];
        $this->thumbnail = $data['_links']['thumbnailFile']['href'];

    }

    /**
     * @return int|mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return BasicTaxon
     */
    public function getTaxon(): BasicTaxon
    {
        return $this->taxon;
    }

    /**
     * @return mixed|string
     */
    public function getCopyright()
    {
        return $this->copyright;
    }

    /**
     * @return mixed|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed|string
     */
    public function getLicence()
    {
        return $this->licence;
    }

    /**
     * @return mixed|string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @return mixed|string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return mixed|string
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }




}