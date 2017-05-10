<?php

namespace AuditorBundle\Entity;

class Comment
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

    public function getFileId() : int
    {
        return $this->fileId;
    }

    public function setFileId(int $fileId) : self
    {
        $this->fileId = $fileId;

        return $this;
    }

    public function getAuthorId() : int
    {
        return $this->authorId;
    }

    public function setAuthorId(int $authorId) : self
    {
        $this->authorId = $authorId;

        return $this;
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

    public function setContent(string $content) : self
    {
        $this->content = $content;

        return $this;
    }

    public function getContent() : string
    {
        return $this->content;
    }
}
