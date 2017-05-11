<?php

namespace Tests\Unit\AuditorBundle;

use AuditorBundle\Command\CreateNewProjectCommand;
use AuditorBundle\Command\Handler\CreateNewProjectHandler;
use AuditorBundle\Event\CreatedNewProjectEvent;
use PHPUnit\Framework\TestCase;
use Tests\Common\Mock\EventBusMock;
use Tests\Common\Mock\ProjectInMemoryRepository;
use Tests\Common\Mock\UserInMemoryRepository;

class CreateNewProjectHandlerTest extends TestCase
{
    /**
     * @test
     */
    public function raiseCreatedNewProjectEvent()
    {
        $eventBus = new EventBusMock();
        $projectRepository = new ProjectInMemoryRepository();
        $userRepository = new UserInMemoryRepository();
        $handler = new CreateNewProjectHandler($eventBus, $projectRepository, $userRepository);
        $command = new CreateNewProjectCommand('Project name', 1);

        $handler->handle($command);

        $this->assertInstanceOf(CreatedNewProjectEvent::class, $eventBus->getRaised()[0]);
        $this->assertEquals('Project name', $eventBus->getRaised()[0]->name());
        $this->assertEquals(1, $eventBus->getRaised()[0]->ownerId());
    }
}
