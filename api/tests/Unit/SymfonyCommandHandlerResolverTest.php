<?php

namespace Tests\Unit\CqrsBundle;

use AppBundle\Command\CreateNewProjectCommand;
use CqrsBundle\SymfonyHandlerResolver;
use Tests\Mock\CommandHandlerMock;
use Tests\Mock\ContainerMock;
use PHPUnit\Framework\TestCase;

class SymfonyCommandHandlerResolverTest extends TestCase
{
    /**
     * @test
     * @expectedException \CqrsBundle\Exception\CommandHandlerNotFoundException
     */
    public function cantFoundCommandHandler()
    {
        $container = new ContainerMock();
        $resolver = new SymfonyHandlerResolver($container);
        $command = new CreateNewProjectCommand('Project name');

        $resolver->handler($command);
    }

    /**
     * @test
     */
    public function returnCommandHandlerObject()
    {
        $handler = new CommandHandlerMock();
        $command = new CreateNewProjectCommand('Project name');
        $container = new ContainerMock();
        $resolver = new SymfonyHandlerResolver($container);

        $container->set('app.command_handler.create_new_project', $handler);

        $this->assertInstanceOf(CommandHandlerMock::class, $resolver->handler($command));
    }
}