<?php

namespace Mkijak\NoindexByPath;

class RobotsModifier
{
    public static function setNoindex()
    {
        add_action('wp_head', 'wp_no_robots', 65000);
    }
}
