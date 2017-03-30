<?php

namespace AppBundle\Adapter;

use CqrsBundle\Querying\QueryDispatcherInterface;
use CqrsBundle\Querying\QueryInterface;
use Doctrine\DBAL\Connection as Dbal;

class DbalQueryDispatcher implements QueryDispatcherInterface
{
    private $dbal;

    public function __construct(Dbal $dbal)
    {
        $this->dbal = $dbal;
    }

    public function execute(QueryInterface $query)
    {
        return $query->execute($this->dbal);
    }
}