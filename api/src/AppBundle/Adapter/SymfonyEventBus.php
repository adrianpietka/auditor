<?php

namespace AppBundle\Adapter;

use CqrsBundle\Eventing\EventBusInterface;
use CqrsBundle\Eventing\EventInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class SymfonyEventBus implements EventBusInterface
{
    private $eventDispatcher;
    private $raised = [];

    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

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
        $this->eventDispatcher->dispatch(get_class($event), $event);
    }
}