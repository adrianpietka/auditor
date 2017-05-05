<?php

namespace AppBundle\Query\Dto;

class ProjectCollectionDto extends \ArrayIterator implements \JsonSerializable
{
    public function __construct($array = array(), $flags = 0)
    {
        parent::__construct(array_map(function ($project) {
            return new ProjectDto($project);
        }, $array), $flags);
    }

    public function jsonSerialize()
    {
        return $this;
    }
}