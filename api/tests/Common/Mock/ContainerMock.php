<?php

namespace Tests\Common\Mock;

use Symfony\Component\DependencyInjection\ContainerInterface;

class ContainerMock implements ContainerInterface
{
    private $contener = [];

    public function set($id, $service)
    {
        $this->contener[$id] = $service;
    }

    public function get($id, $invalidBehavior = self::EXCEPTION_ON_INVALID_REFERENCE)
    {
        if (isset($this->contener[$id])) {
            return $this->contener[$id];
        }

        throw new \Exception('Not implemented: ContainerMock->get');
    }

    public function has($id)
    {
        return isset($this->contener[$id]);
    }

    public function initialized($id)
    {
        throw new \Exception('Not implemented: ContainerMock->initialized');
    }

    public function getParameter($name)
    {
        throw new \Exception('Not implemented: ContainerMock->getParameter');
    }

    public function hasParameter($name)
    {
        throw new \Exception('Not implemented: ContainerMock->hasParameter');
    }

    public function setParameter($name, $value)
    {
        throw new \Exception('Not implemented: ContainerMock->setParameter');
    }
}
