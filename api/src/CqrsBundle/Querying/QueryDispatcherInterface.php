<?php

namespace CqrsBundle\Querying;

interface QueryDispatcherInterface
{
    public function execute(QueryInterface $query);
}