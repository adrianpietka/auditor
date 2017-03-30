<?php

namespace AppBundle\Controller;

use CqrsBundle\Commanding\CommandBusInterface;
use CqrsBundle\Querying\QueryDispatcherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AppController extends Controller
{
    /**
     * @var CommandBusInterface
     */
    protected $commandBus;

    /**
     * @var QueryDispatcherInterface
     */
    protected $queryDispatcher;

    /**
     * @return CommandBusInterface
     */
    public function commandBus() : CommandBusInterface
    {
        if (!$this->commandBus) {
            $this->commandBus = $this->get('app.command_bus');
        }

        return $this->commandBus;
    }

    /**
     * @return QueryDispatcherInterface
     */
    public function queryDispatcher() : QueryDispatcherInterface
    {
        if (!$this->queryDispatcher) {
            $this->queryDispatcher = $this->get('app.query_dispatcher');
        }

        return $this->queryDispatcher;
    }
}