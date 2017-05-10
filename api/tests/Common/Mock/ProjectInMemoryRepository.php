<?php

namespace Tests\Common\Mock;

use AuditorBundle\Entity\Project;
use AuditorBundle\Repository\ProjectRepositoryInterface;

class ProjectInMemoryRepository implements ProjectRepositoryInterface
{
    private $currentId = 1;
    private $data = [];

    public function add(Project $project) : Project
    {
        $project->setId($this->currentId++);
        $project->setAdded(new \DateTime());

        $this->data[] = $project;

        return $project;
    }

    public function getById(int $id) : Project
    {
        $projects = array_filter($this->data, function($project) use ($id) {
            return $project->getId() === $id;
        });

        return $projects[0] ?? null;
    }
}