<?php

namespace AppBundle\Query\Dto;

class ProjectListDto extends \ArrayIterator implements \JsonSerializable
{
    public function current()
    {
        return new ProjectDto(parent::current());
    }

    public function jsonSerialize()
    {
        return iterator_to_array($this);
    }
}