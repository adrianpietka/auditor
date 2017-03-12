<?php

namespace AppBundle\Repository\Doctrine;

use AppBundle\Entity\ProjectEntity;
use AppBundle\Repository\ProjectRepositoryInterface;
use Doctrine\ORM\EntityManager;

class ProjectRepositoryDoctrine implements ProjectRepositoryInterface
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function add(ProjectEntity $project) : ProjectEntity
    {
        $project->setAdded(new \DateTime());

        $this->entityManager->persist($project);
        $this->entityManager->flush();

        return $project;
    }

    public function getById(int $id) : ProjectEntity
    {
        return $this->entityManager
            ->getRepository(ProjectEntity::class)
            ->findOneById($id);
    }
}