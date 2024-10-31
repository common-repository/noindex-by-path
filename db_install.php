<?php

function mkijakNoindexForPathInstall() {
    global $wpdb;

    $charset_collate = $wpdb->get_charset_collate();

    $tableName = \Mkijak\NoindexByPath\DbTableNameResolver::resolve();

    $sql = "CREATE TABLE IF NOT EXISTS $tableName (path BLOB NOT NULL) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta($sql);
}

