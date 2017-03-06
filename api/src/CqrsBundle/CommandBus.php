<?php

namespace CqrsBundle;

class CommandBus implements CommandBusInterface
{
    /**
     * @var HandlerResolverInterface
     */
    private $handlerResolver;

    /**
     * @param HandlerResolverInterface $handlerResolver
     */
    public function __construct(HandlerResolverInterface $handlerResolver)
    {
        $this->handlerResolver = $handlerResolver;
    }

    /**
     * @param CommandInterface $command
     */
    public function handle(CommandInterface $command) : void
    {
        $handler = $this->handlerResolver->handler($command);
        $handler->handle($command);
    }
}