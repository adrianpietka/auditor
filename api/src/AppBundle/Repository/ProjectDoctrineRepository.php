<?php

namespace AppBundle\Repository;

use AuditorBundle\Entity\Project;
use AuditorBundle\Repository\ProjectRepositoryInterface;
use Doctrine\ORM\EntityManager;

class ProjectDoctrineRepository implements ProjectRepositoryInterface
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function add(Project $project) : Project
    {
        $project->setAdded(new \DateTime());

        $this->entityManager->persist($project);
        $this->entityManager->flush();

        return $project;
    }

    public function getById(int $id) : Project
    {
        return $this->entityManager
            ->getRepository(Project::class)
            ->findOneById($id);
    }
}
