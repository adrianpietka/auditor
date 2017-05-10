<?php

namespace AppBundle\Repository;

use AuditorBundle\Entity\User;
use AuditorBundle\Repository\UserRepositoryInterface;
use Doctrine\ORM\EntityManager;

class UserDoctrineRepository implements UserRepositoryInterface
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getById(int $id) : User
    {
        return $this->entityManager
            ->getRepository(User::class)
            ->findOneById($id);
    }
}