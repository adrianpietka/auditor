<?php

namespace AuditorBundle\Repository;

use AuditorBundle\Entity\User;

interface UserRepositoryInterface
{
    public function getById(int $id) : User;
}
