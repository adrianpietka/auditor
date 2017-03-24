<?php

namespace AuditorBundle\Repository;

use AuditorBundle\Entity\ProjectEntity;

interface ProjectRepositoryInterface
{
    public function getById(int $id) : ProjectEntity;

    public function add(ProjectEntity $project) : ProjectEntity;
}