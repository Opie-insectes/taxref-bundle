<?php

namespace Taxref\TaxrefApi\Thesaurus\Entity;

class Habitat
{
    protected   string      $id;
    protected   string      $name;
    protected   string      $definition;

    public function __construct($data)
    {
        $this->id = $data['id'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->definition = $data['definition'] ?? null;
    }

    /**
     * @return mixed|string|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed|string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed|string|null
     */
    public function getDefinition()
    {
        return $this->definition;
    }


}