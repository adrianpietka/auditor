<?php

namespace AuditorBundle\Exception;

class ResourceDoesNotExistException extends \Exception
{
    public function __construct(int $id)
    {
        parent::__construct(sprintf('Resource with id "%d" does not exist.', $id));
    }
}
