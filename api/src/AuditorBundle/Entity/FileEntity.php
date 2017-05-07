<?php

namespace AuditorBundle\Entity;

class FileEntity
{
    private $id;

    private $projectId;

    private $path;

    private $added;

    private $content;

    public function getId() : int
    {
        return $this->id;
    }

    public function getProjectId()
    {
        return $this->projectId;
    }

    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setPath($path)
    {
        $this->path = $path;
    }

    public function setAdded(\DateTime $added) : self
    {
        $this->added = $added;

        return $this;
    }

    public function getAdded() : \DateTime
    {
        return $this->added;
    }
}
