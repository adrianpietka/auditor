<?php

namespace AppBundle;

use CqrsBundle\Eventing\EventBusInterface;
use CqrsBundle\Eventing\EventInterface;

class SymfonyEventBus implements EventBusInterface
{
    private $events = [];

    public function raise(EventInterface $event) : void
    {
        $this->events[] = $event;
    }

    public function getRaised() : array
    {
        return $this->events;
    }

    public function handle(EventInterface $event) : void
    {
        // usun z events

        echo 'Handluj tym: '; var_dump($event);
    }
}