<?php

namespace AuditorBundle\Entity;

class User
{
    private $id;

    private $login;

    private $displayName;

    public function __construct(int $id = null)
    {
        $this->id = $id;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function getLogin() : string
    {
        return $this->login;
    }

    public function setContent(string $login) : self
    {
        $this->login = $login;

        return $this;
    }

    public function getDisplayName() : string
    {
        return $this->displayName;
    }

    public function setDisplayName(string $displayName) : self
    {
        $this->displayName = $displayName;

        return $this;
    }
}
