<?php 

namespace Vaneves\Tosko;

class Dist
{
    private $path;

    private $src;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function __invoke(Src $src)
    {
        $this->src = $src;

        $this->mkdir();

        if ($src->getContent() === null) {
            $this->saveAll();
        } else {
            $this->save();
        }
    }

    protected function mkdir()
    {
        if (!is_dir($this->path)) {
            mkdir($this->path, 755, true);
        }
    }

    protected function save()
    {
        $path = $this->path . $this->src->getName();
        $content = $this->src->getContent();

        file_put_contents($path, $content);
    }

    protected function saveAll()
    {
        foreach ($this->src->getFiles() as $file) {
            $name = basename($file);
            $path = $this->path . $name;
            $content = file_get_contents($file);

            file_put_contents($path, $content);
        }
    }
}