<?php

namespace AuditorBundle\Exception;

class ProjectDoesNotExistException extends \Exception
{
    public function __construct(int $id)
    {
        parent::__construct(sprintf('Project with id "%d" does not exist.', $id));
    }
}
