<?php

namespace Mkijak\NoindexByPath;

class PathRepository
{
    /**
     * @param string $pathString
     *
     * @return PathModel
     */
    public function find($pathString)
    {
        $q = sprintf('SELECT * FROM %s WHERE path="%s"', DbTableNameResolver::resolve(), $pathString);

        global $wpdb;

        $result = $wpdb->get_row($q);

        if (!$result) {
            return null;
        }

        return new PathModel($result->path);
    }

    /**
     * @return array|PathModel[]
     */
    public function findAll()
    {
        $q = sprintf('SELECT * FROM %s', DbTableNameResolver::resolve());

        global $wpdb;

        $results = $wpdb->get_results($q);

        if (!$results) {
            return [];
        }

        return array_map(function($result) {
            return new PathModel($result->path);
        }, $results);
    }

    /**
     * @param PathModel $path
     */
    public function save(PathModel $path)
    {
        if ($this->find($path->getPath())) {
            return;
        }

        global $wpdb;

        $wpdb->insert(DbTableNameResolver::resolve(), ['path' => $path->getPath()]);
    }

    /**
     * @param PathModel $path
     */
    public function delete(PathModel $path)
    {
        global $wpdb;

        $wpdb->delete(DbTableNameResolver::resolve(), ['path' => $path->getPath()]);
    }
}
