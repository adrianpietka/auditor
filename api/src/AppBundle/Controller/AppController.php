<?php

namespace AppBundle\Controller;

use CqrsBundle\Commanding\CommandBusInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AppController extends Controller
{
    /**
     * @var CommandBusInterface
     */
    protected $commandBus;

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
}