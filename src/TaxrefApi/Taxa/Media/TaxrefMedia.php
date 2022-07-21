<?php

namespace Taxref\TaxrefApi\Taxa\Media;

use Taxref\TaxrefApi\Taxa\Entity\Medium;
use Taxref\TaxrefApi\Taxa\Taxa;

class TaxrefMedia extends Taxa
{

    protected   ?array   $media = null;

    public function __construct()
    {
        parent::__construct();
        $this->setName('media');
        $this->url .= '/%s/media';
    }

    public function getMedia(int $taxonId): ?array
    {
        $this->searchFor($taxonId);
        if(!$this->media) {
            $this->makeMedia();
        }
        return $this->media;
    }

    protected function makeMedia(): void
    {
        foreach ($this->getResults() as $medium) {
            $this->media[] = new Medium($medium);
        }
    }


}