<?php

namespace CqrsBundle\Exception;

class CommandHandlerNotFoundException extends \Exception
{
    /**
     * @param $commandName
     */
    public function __construct($commandName)
    {
        parent::__construct('Handler for ' . $commandName . ' was not found!');
    }
}
