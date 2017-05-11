<?php

namespace Tests\Unit\AppBundle\Adapter;

use AppBundle\Adapter\SymfonyCommandHandlerResolver;
use Tests\Common\Mock\CommandHandlerMock;
use Tests\Common\Mock\ContainerMock;
use PHPUnit\Framework\TestCase;
use Tests\Common\Mock\CreateFakeCommand;

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
        $command = new CreateFakeCommand();

        $resolver->handler($command);
    }

    /**
     * @test
     */
    public function returnCommandHandlerObject()
    {
        $handler = new CommandHandlerMock();
        $command = new CreateFakeCommand();
        $container = new ContainerMock();
        $resolver = new SymfonyCommandHandlerResolver($container);

        $container->set('app.command_handler.create_fake', $handler);

        $this->assertInstanceOf(CommandHandlerMock::class, $resolver->handler($command));
    }
}