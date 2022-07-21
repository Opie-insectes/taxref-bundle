<?php

namespace Taxref\TaxrefApi\Status;

use Taxref\TaxrefClient;

abstract class Status extends TaxrefClient
{

    protected $name = 'status';

    public function __construct()
    {
        parent::__construct();
        $this->setName($this->name);
        $this->url = '/' . $this->getName();
    }

}