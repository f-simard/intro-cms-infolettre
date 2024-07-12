<?php
/*
Plugin Name: ICMS - Inscription Infolettre
Description: Le plugin génère une modale pour inscription à une infolettre. Cette modale est personalisable par les adminisatrateurs.
Author: Filippa Simard
Version: 1
*/

/**
 * assure que la page est passée par la page d'index
 */
if(!defined('ABSPATH')){
	exit;
}


/**
 * defini les constantes de plugin
 */
function icms_infolettre_definir_const(){

	if(!defined('ICMS_INFOLETTRE_PARAMETRES')){
		global $wpdb;
		define('ICMS_INFOLETTRE_PARAMETRES', $wpdb->prefix . 'icms_infolettre_parametres');
	};

	if(!defined('ICMS_INFOLETTRE_INSCRIPTIONS')){
		global $wpdb;
		define('ICMS_INFOLETTRE_INSCRIPTIONS', $wpdb->prefix . 'icms_infolettre_inscriptions');
	}

}
add_action('plugin_loaded', 'icms_infolettre_definir_const', 0);


/**
 * Crée deux tables de l'activation du plug in, si celles-ci ne sont pas existantes
 */
require_once(plugin_dir_path(__FILE__) . 'includes/icms_infolettre_activation.php');
register_activation_hook( __FILE__, 'icms_infolettre_activation' );


/**
 * Supprime la table wp_mon_premier_plugin à la base de données à la désactivation du plugin
 */
function icms_infolettre_deactivation() {

	global $wpdb;
	$table_parametres = $wpdb->prefix . 'icms_infolettre_parametres';
	$wpdb->query( "DROP TABLE IF EXISTS $table_parametres" );

	$table_inscriptions = $wpdb->prefix . 'icms_infolettre_inscriptions';
	$wpdb->query( "DROP TABLE IF EXISTS $table_inscriptions" );

};
register_deactivation_hook( __FILE__, 'icms_infolettre_deactivation' );


/**
 * ajoute un panneau pour personaliser la modale du côté admin
 */
require_once(plugin_dir_path(__FILE__) . 'includes/icms-infolettre-panneau-admin.php');


/**
 * charge les styles et scripts
 */
function icms_infolettre_ajouter_styles_et_scripts() {

	wp_register_style( 'icms-infolettre-style', plugins_url( 'assets/css/main.css', __FILE__ ) );
	wp_enqueue_style( 'icms-infolettre-style' );

	wp_register_script( 'icms-infolettre-script', plugins_url( 'assets/js/main.js', __FILE__ ) );
	wp_enqueue_script( 'icms-infolettre-script' );

};
add_action( 'init', 'icms_infolettre_ajouter_styles_et_scripts' );