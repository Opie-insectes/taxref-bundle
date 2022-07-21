<?php

namespace Taxref\ApiVersion;

use Taxref\TaxrefClient;

class TaxrefApiVersion extends TaxrefClient
{

    /**
     * @var mixed
     */
    private $versions;

    public function getTaxrefVersions()
    {
        $this->setName('taxrefVersions');
        $this->request('/' . $this->getName());
        $this->versions = $this->getResults();
    }

    public function getLastVersion(): TaxrefVersion
    {
        $this->getTaxrefVersions();
        return new TaxrefVersion($this->versions[array_key_last($this->versions)]);
    }

    public function getVersions()
    {
        return $this->versions;
    }

}