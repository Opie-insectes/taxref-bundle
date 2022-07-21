<?php

namespace Taxref\TaxrefApi\Taxa\Status;

use Taxref\TaxrefApi\Taxa\Entity\Status;
use Taxref\TaxrefApi\Taxa\Taxa;

class TaxrefStatusLines extends Taxa
{

    protected ?array $statuses = null;

    public function __construct()
    {
        parent::__construct();
        $this->setName('status');
        $this->url .= '/%s/status/lines';
    }

    public function getStatuses(int $taxonId): ?array
    {
        $this->searchFor($taxonId);
        if(!$this->statuses) {
            $this->makeStatuses();
        }
        return $this->statuses;
    }

    protected function makeStatuses(): void
    {
        foreach ($this->getResults() as $status) {
            $this->statuses[] = new Status($status);
        }
    }


}