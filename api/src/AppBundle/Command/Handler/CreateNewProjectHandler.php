<?php

namespace AppBundle\Command\Handler;

use AppBundle\Command\CreateNewProjectCommand;
use AppBundle\Entity\ProjectEntity;
use AppBundle\Repository\ProjectRepositoryInterface;

class CreateNewProjectHandler
{
    private $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function handle(CreateNewProjectCommand $command) : void
    {
        $project = new ProjectEntity();
        $project->setName($command->name());

        $this->projectRepository->add($project);
    }
}