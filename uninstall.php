<?php

/**
 * supprime les tables du plug in à la suppression du plugin
 */
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	die;
};

global $wpdb;

$table_parametres = $wpdb->prefix . 'icms_infolettre_parametres';
$wpdb->query( "DROP TABLE IF EXISTS $table_parametres" );

$table_inscriptions = $wpdb->prefix . 'icms_infolettre_inscriptions';
$wpdb->query( "DROP TABLE IF EXISTS $table_inscriptions" );