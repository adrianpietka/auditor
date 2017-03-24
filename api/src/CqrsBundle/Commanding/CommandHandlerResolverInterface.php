<?php

namespace CqrsBundle\Commanding;

interface CommandHandlerResolverInterface
{
    public function handler(CommandInterface $command);
}