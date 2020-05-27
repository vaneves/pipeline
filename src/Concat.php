<?php 

namespace Vaneves\Tosko;

class Concat
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function __invoke(Src $src)
    {
        $content = '';
        foreach ($src->getFiles() as $file) {
            $path = realpath($file);
            if ($path && file_exists($path)) {
                $content .= file_get_contents($path);
            }
        }

        $src->setName($this->name);
        $src->setContent($content);

        return $src;
    }
}