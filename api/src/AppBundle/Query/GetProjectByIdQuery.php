<?php

namespace AppBundle\Query;

use AppBundle\Query\Dto\ProjectDetailsDto;
use AuditorBundle\Exception\ProjectDoesNotExistException;
use CqrsBundle\Querying\QueryInterface;
use Doctrine\DBAL\Connection as Dbal;

class GetProjectByIdQuery implements QueryInterface
{
    private $projectId;

    public function __construct(int $projectId)
    {
        $this->projectId = $projectId;
    }

    public function execute(Dbal $dbal) : ProjectDetailsDto
    {
        $sql = 'SELECT * FROM project WHERE id = :id LIMIT 1';
        $project = $dbal->fetchAssoc($sql, [':id' => $this->projectId]);

        if (!$project) {
            throw new ProjectDoesNotExistException($this->projectId);
        }

        return new ProjectDetailsDto($project);
    }
}
