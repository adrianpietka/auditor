<?php

namespace AppBundle\Command;

use CqrsBundle\CommandInterface;

class CreateNewProjectCommand implements CommandInterface
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function name() : string
    {
        return $this->name;
    }
}