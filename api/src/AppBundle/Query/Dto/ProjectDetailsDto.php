<?php

namespace AppBundle\Query\Dto;

class ProjectDetailsDto implements \JsonSerializable
{
    public $id;
    public $name;
    public $added;

    public function __construct(array $data)
    {
        $this->id = isset($data['id']) ? (int)$data['id'] : null;
        $this->name = isset($data['name']) ? (string)$data['name'] : '';
        $this->added = isset($data['added']) ? new \DateTime($data['added']) : null;
    }

    public function jsonSerialize()
    {
        return $this;
    }
}
