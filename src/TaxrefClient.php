<?php

namespace Taxref;

use Symfony\Component\HttpClient\HttpClient;
use Taxref\Exceptions\MalformedUrlException;
use \Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class TaxrefClient
{

    protected   string                  $base;
    protected   array                   $headers;
    protected   HttpClientInterface     $client;
    protected   ?array                  $results = null;
    protected   ?string                 $name    = null;
    protected   string                  $url     = '';

    public function __construct()
    {
        $this->base     = 'https://taxref.mnhn.fr/api';
        $this->headers  = ['accept' => 'application/hal+json;version=1'];
        $this->client   = HttpClient::create();
    }

    protected function testUrl($url)
    {
        if(substr($url, 0, 1) !== '/') {
            throw new MalformedUrlException('Your url must begin by "/" in order to complete ' . $this->base);
        }
    }

    protected function success($results): bool
    {
        return $results->getStatusCode() === 200;
    }

    protected function makeResults($queryResult): void
    {
        if(isset($queryResult['_embedded']) && isset($queryResult['_embedded'][$this->name])) {
            $this->results =$queryResult['_embedded'][$this->name];
        } else if (is_array($queryResult) && isset($queryResult['id'])) {
            $this->results = $queryResult;
        }
    }

    /**
     * @param string $url formed like : /taxa/autocomplete ...
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     * @throws MalformedUrlException
     */
    public function request(string $url): void
    {

        $this->testUrl($url);

        $results =  $this->client->request('GET', $this->base . $url, [
            'headers' => $this->headers
        ]);

        if(!$this->success($results)) {
            $this->results = [];
            return;
        }

        if($results->getContent()) {
            $this->makeResults(json_decode($results->getContent(), true));
            return;
        }

        $this->results = null;
    }

    /**
     * @param null $param
     * @throws MalformedUrlException
     * @throws \Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface
     * @throws \Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface
     */
    public function searchFor($param = null)
    {
        $this->results = [];
        if($param) {
            $this->request(sprintf($this->url, $param));
            return;
        }
        $this->request($this->url);
    }


    public function getResults()
    {
        return $this->results;
    }

    protected function hasBeenRequested(): bool
    {
        return null !== $this->results;
    }

    protected function hasResult(): bool
    {
        return $this->results && count($this->results) > 0;
    }

    /**
     * @return null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param null $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }





}