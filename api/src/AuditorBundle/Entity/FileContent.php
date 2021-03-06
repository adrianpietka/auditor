<?php

namespace AuditorBundle\Entity;

class FileContent
{
    private $id;

    private $content;

    public function getId() : int
    {
        return $this->id;
    }

    public function getContent() : string
    {
        return $this->content;
    }

    public function setContent(string $content) : self
    {
        $this->content = $content;

        return $this;
    }
}
