<?php

namespace AuditorBundle\Entity;

class CommentEntity
{
    private $id;
    
    private $fileId;

    private $authorId;

    private $added;
    
    private $content;

    public function getId() : int
    {
        return $this->id;
    }
}
