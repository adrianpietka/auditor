<?php

namespace AppBundle\Adapter;

use CqrsBundle\Commanding\CommandHandlerResolverInterface;
use CqrsBundle\Commanding\CommandInterface;
use CqrsBundle\Exception\CommandHandlerNotFoundException;
use Symfony\Component\DependencyInjection\ContainerInterface;

class SymfonyCommandHandlerResolver implements CommandHandlerResolverInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param CommandInterface $command
     * @return object
     */
    public function handler(CommandInterface $command)
    {
        $handlerContainerName = $this->getHandlerName($command);

        if (!$this->container->has($handlerContainerName)) {
            throw new CommandHandlerNotFoundException(get_class($command));
        }

        return $this->container->get($handlerContainerName);
    }

    /**
     * @param CommandInterface $command
     * @return string
     */
    private function getHandlerName(CommandInterface $command) : string
    {
        $commandNamespace = explode('\\', get_class($command));
        $commandName = end($commandNamespace);
        $handlerName = str_replace('_command', '', $this->camelCaseToUnderscore($commandName));

        return 'app.command_handler.' . $handlerName;
    }

    /**
     * @param string $input
     * @return string
     */
    private function camelCaseToUnderscore(string $input) : string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
    }
}