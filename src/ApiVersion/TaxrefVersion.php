<?php

namespace Taxref\ApiVersion;

class TaxrefVersion
{

    private string $id;
    private string $name;
    private string $date;
    private string $manager;
    private bool   $isCurrent;

    public function __construct(array $version)
    {
        $this->id        = $version['id'];
        $this->name      = $version['name'];
        $this->date      = $version['date'];
        $this->manager   = $version['responsable'];
        $this->isCurrent = $version['current'];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return mixed|string
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * @return bool
     */
    public function isCurrent(): bool
    {
        return $this->isCurrent;
    }



}