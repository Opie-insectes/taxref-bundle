<?php

namespace Taxref\TaxrefApi\Bibliography\Entity;

class BibliographicSource
{

    protected   ?int        $id;
    protected   ?string     $shortCitation;
    protected   ?string     $year;
    protected   ?string     $fullCitation;
    protected   ?string     $url;
    protected   ?string     $doi;
    protected   ?string     $doiUrl;
    protected   ?string     $zooBankId;
    protected   ?string     $zooBankUri;
    protected   ?string     $abstract;


    public function __construct($data)
    {
        $class = new \ReflectionClass($this);
        foreach ($class->getProperties() as $property) {
                $this->{$property->getName()} = $data[$property->getName()] ?? null;
        }
    }

}