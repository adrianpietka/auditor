<?php

namespace CqrsBundle;

use EventBus\EventBusInterface;

class CommandBus implements CommandBusInterface
{
    /**
     * @var HandlerResolverInterface
     */
    private $handlerResolver;

    /**
     * @var EventBusInterface
     */
    private $eventBus;

    /**
     * @param HandlerResolverInterface $handlerResolver
     * @param EventBusInterface $eventBus
     */
    public function __construct(HandlerResolverInterface $handlerResolver, EventBusInterface $eventBus)
    {
        $this->handlerResolver = $handlerResolver;
        $this->eventBus = $eventBus;
    }

    /**
     * @param CommandInterface $command
     */
    public function handle(CommandInterface $command) : void
    {
        $handler = $this->handlerResolver->handler($command);
        $handler->handle($command);

        while($event = $this->eventBus->getNextToRaised())
        {
            $this->eventBus->handle($event);
        }
    }
}