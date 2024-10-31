<?php

namespace Mkijak\NoindexByPath;

class RelativePathResolver
{
    /**
     * @return string
     */
    public static function resolve()
    {
        return $_SERVER['REQUEST_URI'];
    }
}
