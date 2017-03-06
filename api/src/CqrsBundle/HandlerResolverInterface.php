<?php

namespace CqrsBundle;

interface HandlerResolverInterface
{
    public function handler(CommandInterface $command);
}