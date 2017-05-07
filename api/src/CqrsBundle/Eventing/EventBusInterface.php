<?php

namespace CqrsBundle\Eventing;

interface EventBusInterface
{
    public function raise(EventInterface $event) : void;

    public function getRaised() : array;

    public function dispatch(EventInterface $event) : void;
}