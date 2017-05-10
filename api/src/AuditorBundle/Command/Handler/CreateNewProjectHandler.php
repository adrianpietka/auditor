<?php

namespace AuditorBundle\Command\Handler;

use AuditorBundle\Command\CreateNewProjectCommand;
use AuditorBundle\Entity\Project;
use AuditorBundle\Event\CreatedNewProjectEvent;
use AuditorBundle\Repository\ProjectRepositoryInterface;
use AuditorBundle\Repository\UserRepositoryInterface;
use CqrsBundle\Commanding\CommandHandlerInterface;
use CqrsBundle\Eventing\EventBusInterface;

class CreateNewProjectHandler implements CommandHandlerInterface
{
    private $eventBus;
    private $projectRepository;
    private $userRepository;

    public function __construct(
        EventBusInterface $eventBus,
        ProjectRepositoryInterface $projectRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->eventBus = $eventBus;
        $this->projectRepository = $projectRepository;
        $this->userRepository = $userRepository;
    }

    public function handle(CreateNewProjectCommand $command) : void
    {
        $owner = $this->userRepository->getById($command->ownerId());

        $project = new Project();
        $project->setName($command->name());
        $project->setOwner($owner);

        $this->projectRepository->add($project);
        $this->eventBus->raise(new CreatedNewProjectEvent($project->getId(), $project->getOwner()->getId(),
            $project->getAdded(),
            $project->getName()));
    }
}