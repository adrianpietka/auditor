<?php

namespace CqrsBundle\Commanding;

interface CommandBusInterface
{
    public function handle(CommandInterface $command) : void;
}