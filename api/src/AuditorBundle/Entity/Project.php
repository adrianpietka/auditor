<?php

namespace AuditorBundle\Entity;

class Project
{
    private $id;

    private $name;

    private $added;

    private $owner;

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

    public function getAdded() : \DateTime
    {
        return $this->added;
    }

    public function setAdded(\DateTime $added) : self
    {
        $this->added = $added;

        return $this;
    }

    public function getOwner() : User
    {
        return $this->owner;
    }

    public function setOwner(User $owner) : self
    {
        $this->owner = $owner;

        return $this;
    }

    public function getOwnerId() : int
    {
        return $this->ownerId;
    }

    public function setOwnerId(int $ownerId) : self
    {
        $this->ownerId = $ownerId;

        return $this;
    }
}
