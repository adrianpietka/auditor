<?php

namespace AuditorBundle\Entity;

class Project
{
    private $id;

    private $name;

    private $added;

    private $ownerId;

    public function setId(int $id) : self
    {
        $this->id = $id;

        return $this;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function setName(string $name) : self
    {
        $this->name = $name;

        return $this;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function setAdded(\DateTime $added) : self
    {
        $this->added = $added;

        return $this;
    }

    public function getAdded() : \DateTime
    {
        return $this->added;
    }

    public function getOwner() : int
    {
        return $this->ownerId;
    }

    public function setOwnerId(int $ownerId) : self
    {
        $this->ownerId = $ownerId;

        return $this;
    }
}
