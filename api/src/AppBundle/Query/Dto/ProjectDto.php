<?php

namespace AppBundle\Query\Dto;

class ProjectDto implements \JsonSerializable
{
    public $id;
    public $name;

    public function __construct(array $data)
    {
        $this->id = isset($data['id']) ? (int)$data['id'] : null;
        $this->name = isset($data['name']) ? (string)$data['name'] : '';
    }

    public function jsonSerialize()
    {
        return $this;
    }
}