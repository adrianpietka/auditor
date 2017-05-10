<?php

namespace AuditorBundle\Command;

use CqrsBundle\Commanding\CommandInterface;

class CreateNewProjectCommand implements CommandInterface
{
    private $name;
    private $ownerId;

    public function __construct(string $name, int $ownerId)
    {
        $this->name = $name;
        $this->ownerId = $ownerId;
    }

    public function name() : string
    {
        return $this->name;
    }

    public function ownerId() : int
    {
        return $this->ownerId;
    }
}