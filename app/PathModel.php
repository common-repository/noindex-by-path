<?php

namespace Mkijak\NoindexByPath;

class PathModel
{
    /**
     * @var string
     */
    private $path;

    /**
     * @param string $path
     */
    public function __construct ($path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }
}
