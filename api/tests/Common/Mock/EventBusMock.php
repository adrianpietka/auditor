<?php

namespace Tests\Common\Mock;

use CqrsBundle\Eventing\EventBusInterface;
use CqrsBundle\Eventing\EventInterface;

class EventBusMock implements EventBusInterface
{
    private $raised = [];

    public function raise(EventInterface $event) : void
    {
        $this->raised[] = $event;
    }

    public function getRaised() : array
    {
        return $this->raised;
    }

    public function dispatch(EventInterface $event) : void
    {
        throw new \Exception('Not implemented: EventBusMock->dispatch');
    }
}