<?php

namespace Taxref\TaxrefApi\Status\Entity;

class StatusType
{

    protected   string    $id;
    protected   string    $name;
    protected   string    $group;

    public function __construct(array $data)
    {
        $this->id    = $data['id'];
        $this->name  = $data['name'];
        $this->group = $data['group'];
    }

    /**
     * @return mixed|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed|string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed|string
     */
    public function getGroup()
    {
        return $this->group;
    }



}