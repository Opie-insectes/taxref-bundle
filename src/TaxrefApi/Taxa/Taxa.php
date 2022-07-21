<?php

namespace Taxref\TaxrefApi\Taxa;

use Taxref\TaxrefClient;

abstract class Taxa extends TaxrefClient
{

    protected ?string $name = 'taxa';

    public function __construct()
    {
        parent::__construct();
        $this->setName($this->name);
        $this->url = '/' . $this->getName();
    }

}