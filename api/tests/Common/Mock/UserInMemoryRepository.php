<?php

namespace Tests\Common\Mock;

use AuditorBundle\Entity\User;
use AuditorBundle\Repository\UserRepositoryInterface;

class UserInMemoryRepository implements UserRepositoryInterface
{
    public function getById(int $id) : User
    {
        return new User($id);
    }
}
