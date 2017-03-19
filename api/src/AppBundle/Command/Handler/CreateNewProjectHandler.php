<?php

namespace AppBundle\Command\Handler;

use AppBundle\Command\CreateNewProjectCommand;
use AppBundle\Entity\ProjectEntity;
use AppBundle\Repository\ProjectRepositoryInterface;

class CreateNewProjectHandler
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