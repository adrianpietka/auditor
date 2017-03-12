<?php

namespace AppBundle\Repository;

use AppBundle\Entity\ProjectEntity;

interface ProjectRepositoryInterface
{
    public function getById(int $id) : ProjectEntity;

    public function add(ProjectEntity $project) : ProjectEntity;
}