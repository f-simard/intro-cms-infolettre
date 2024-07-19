<?php

/**
 * supprime les tables du plug in à la suppression du plugin
 */
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {

	die;
	
};

global $wpdb;

$table_parametres = $wpdb->prefix . 'iil_parametres';
$wpdb->query( "DROP TABLE IF EXISTS $table_parametres" );

$table_inscriptions = $wpdb->prefix . 'iil_inscriptions';
$wpdb->query( "DROP TABLE IF EXISTS $table_inscriptions" );