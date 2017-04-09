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
}
