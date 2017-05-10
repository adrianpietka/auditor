<?php

namespace AuditorBundle\Entity;

class File
{
    private $id;

    private $projectId;

    private $contentId;

    private $path;

    private $added;

    public function getId() : int
    {
        return $this->id;
    }

    public function getProjectId() : int
    {
        return $this->projectId;
    }

    public function setProjectId(int $projectId) : self
    {
        $this->projectId = $projectId;

        return $this;
    }

    public function getContentId() : int
    {
        return $this->contentId;
    }

    public function setContentId($contentId) : selt
    {
        $this->contentId = $contentId;

        return $this;
    }

    public function getPath() : string
    {
        return $this->path;
    }

    public function setPath($path) : self
    {
        $this->path = $path;

        return $this;
    }

    public function getAdded() : \DateTime
    {
        return $this->added;
    }

    public function setAdded(\DateTime $added) : self
    {
        $this->added = $added;

        return $this;
    }
}
