<?php

namespace AppBundle\Query;

use AppBundle\Query\Dto\ProjectDto;
use AppBundle\Query\Util\PaginationUtil;
use CqrsBundle\Querying\QueryInterface;
use Doctrine\DBAL\Connection as Dbal;

class ListsProjectQuery implements QueryInterface
{
    private $pagination;

    public function __construct(PaginationUtil $pagination)
    {
        $this->pagination = $pagination;
    }

    public function execute(Dbal $dbal) : array
    {
        $sql = 'SELECT * FROM project LIMIT ' . $this->pagination->limit() . ' OFFSET ' . $this->pagination->offset();
        $results = $dbal->fetchAll($sql);

        return array_map(function ($project) {
            return new ProjectDto($project);
        }, $results);
    }
}