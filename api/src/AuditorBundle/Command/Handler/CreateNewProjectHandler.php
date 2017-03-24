<?php

namespace AuditorBundle\Command\Handler;

use AuditorBundle\Command\CreateNewProjectCommand;
use AuditorBundle\Entity\ProjectEntity;
use AuditorBundle\Event\CreatedNewProjectEvent;
use AuditorBundle\Repository\ProjectRepositoryInterface;
use CqrsBundle\Commanding\CommandHandlerInterface;
use CqrsBundle\Eventing\EventBusInterface;

class CreateNewProjectHandler implements CommandHandlerInterface
{
    private $eventBus;
    private $projectRepository;

    public function __construct(EventBusInterface $eventBus, ProjectRepositoryInterface $projectRepository)
    {
        $this->eventBus = $eventBus;
        $this->projectRepository = $projectRepository;
    }

    public function handle(CreateNewProjectCommand $command) : void
    {
        $project = new ProjectEntity();
        $project->setName($command->name());

        $this->projectRepository->add($project);
        $this->eventBus->raise(new CreatedNewProjectEvent($project->getId(), $project->getAdded(), $project->getName()));
    }
}