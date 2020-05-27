<?php 

namespace Vaneves\Tosko;

class Src
{
    protected $files;

    protected $name = null;

    protected $content = null;

    public function __construct(array $files)
    {
        $this->files = [];
        foreach ($files as $expression) {
            $subfiles = glob($expression);
            foreach ($subfiles as $file) {
                array_push($this->files, $file);
            }
        }
    }

    public function getFiles()
    {
        return $this->files;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }
}