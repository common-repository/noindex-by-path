<?php

/*
Plugin Name: Noindex by Path
Description: This simple plugin allows you to set noindex meta tag for specific paths.
Version: 1.0
Author: Marcin Kijak
Author URI: mailto:kijak.marcin+wordpress@gmail.com
License: GPLv3
Text Domain: noindexbypath
Domain Path: /languages
*/

require_once 'db_install.php';
require_once 'app/loader.php';

function runMkijakNoindexByPath()
{
    if (!array_key_exists('mkijakRobotsByPath', $GLOBALS)) {
        $GLOBALS['mkijakNoindexByPath'] = new \Mkijak\NoindexByPath\NoindexByPath();
    }

    global $mkijakNoindexByPath;

    /** @var \Mkijak\NoindexByPath\NoindexByPath $mkijakNoindexByPath */
    $mkijakNoindexByPath->checkPageAgainstNoindexedPaths();
}

register_activation_hook(__FILE__, 'mkijakNoindexForPathInstall');

add_action('wp_head', 'runMkijakNoindexByPath');

if (is_admin()) {
    add_action('admin_menu', array('\Mkijak\NoindexByPath\NoindexByPathAdmin', 'addMenuPage'));
    add_action( 'plugins_loaded', 'noindexByPathTextdomain');
}

function noindexByPathTextdomain() {
    load_plugin_textdomain('noindexbypath', false, basename( dirname( __FILE__ ) ) . '/languages');
}
