<?php

namespace AuditorBundle\Repository;

use AuditorBundle\Entity\Project;

interface ProjectRepositoryInterface
{
    public function getById(int $id) : Project;
    public function add(Project $project) : Project;
}
