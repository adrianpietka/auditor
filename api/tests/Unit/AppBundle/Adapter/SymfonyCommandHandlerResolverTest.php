<?php

namespace Tests\Unit\AppBundle\Adapter;

use AuditorBundle\Command\CreateNewProjectCommand;
use AppBundle\Adapter\SymfonyCommandHandlerResolver;
use Tests\Common\Mock\CommandHandlerMock;
use Tests\Common\Mock\ContainerMock;
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
        $resolver = new SymfonyCommandHandlerResolver($container);
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
        $resolver = new SymfonyCommandHandlerResolver($container);

        $container->set('app.command_handler.create_new_project', $handler);

        $this->assertInstanceOf(CommandHandlerMock::class, $resolver->handler($command));
    }
}