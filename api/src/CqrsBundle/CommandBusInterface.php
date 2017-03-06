<?php

namespace CqrsBundle;

interface CommandBusInterface
{
    public function handle(CommandInterface $command) : void;
}