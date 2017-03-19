<?php

namespace EventBus;

interface EventBusInterface
{
    public function raise(EventInterface $event) : void;

    public function getNextToRaised() : EventInterface;

    public function handle(EventInterface $event) : void;
}