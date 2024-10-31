<?php

namespace Mkijak\NoindexByPath;

class DbTableNameResolver
{
    /**
     * @return string
     */
    public static function resolve()
    {
        global $wpdb;

        return sprintf('%snoindex_by_path', $wpdb->prefix);
    }
}
