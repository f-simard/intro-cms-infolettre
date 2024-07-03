<?php
// Si uninstall.php n'est pas appelé par WordPress, die
// const WP_UNINSTALL_PLUGIN défini par WP
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
 die;
}
global $wpdb;
$table_parametres = $wpdb->prefix . 'icms_infolettre_parametres';
$wpdb->query( "DROP TABLE IF EXISTS $table_parametres" );

$table_inscriptions = $wpdb->prefix . 'icms_infolettre_inscriptions';
$wpdb->query( "DROP TABLE IF EXISTS $table_inscriptions" );