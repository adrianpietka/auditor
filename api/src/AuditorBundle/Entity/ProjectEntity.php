<?php

namespace AuditorBundle\Entity;

class ProjectEntity
{
    private $id;

    private $name;

    private $added;

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
}
