<?php

namespace Mkijak\NoindexByPath;

class NoindexByPathAdmin
{
    public static function addMenuPage()
    {
        if (is_admin()) {
            add_menu_page('Noindex by Path',
                'Noindex by Path',
                'edit_others_pages',
                'robots-by-path',
                array('Mkijak\NoindexByPath\NoindexByPathAdmin', 'printMenu'));
        }
    }

    public static function printMenu()
    {
        $repository = new PathRepository();

        if ($_POST) {
            self::updateData($repository);
        }

        $paths = $repository->findAll();

        require_once 'template/admin-template.php';
    }

    /**
     * @param PathRepository $repository
     */
    private static function updateData (PathRepository $repository)
    {
        foreach ($repository->findAll() as $path) {
            $repository->delete($path);
        }

        foreach ($_POST['path'] as $newPathString) {
            if (!$newPathString) {
                continue;
            }

            $repository->save(new PathModel($newPathString));
        }
    }
}
