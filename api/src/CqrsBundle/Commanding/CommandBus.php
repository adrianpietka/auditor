<?php

namespace CqrsBundle\Commanding;

use CqrsBundle\Eventing\EventBusInterface;

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
     * @param CommandHandlerResolverInterface $handlerResolver
     * @param EventBusInterface $eventBus
     */
    public function __construct(CommandHandlerResolverInterface $handlerResolver, EventBusInterface $eventBus)
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

        foreach ($this->eventBus->getRaised() as $event) {
            $this->eventBus->dispatch($event);
        }
    }
}