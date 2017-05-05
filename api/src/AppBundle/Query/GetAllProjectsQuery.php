<?php

namespace AppBundle\Query;

use AppBundle\Query\Dto\ProjectCollectionDto;
use AppBundle\Query\Util\PaginationUtil;
use CqrsBundle\Querying\QueryInterface;
use Doctrine\DBAL\Connection as Dbal;

class GetAllProjectsQuery implements QueryInterface
{
    private $pagination;

    public function __construct(PaginationUtil $pagination)
    {
        $this->pagination = $pagination;
    }

    public function execute(Dbal $dbal) : ProjectCollectionDto
    {
        $sql = 'SELECT * FROM project LIMIT ' . $this->pagination->limit() . ' OFFSET ' . $this->pagination->offset();
        $results = $dbal->fetchAll($sql);

        return new ProjectCollectionDto($results);
    }
}