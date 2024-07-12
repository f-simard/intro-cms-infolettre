<?php

/**
 * retourne les parametres personnalisables de la modale
 */
function icms_infolettre_getParams(){

	global $wpdb;

	$query = "SELECT * FROM " . ICMS_INFOLETTRE_PARAMETRES . " WHERE id=1";
	$results = $wpdb->get_results( $query );

	return $results[0];
	
}


/**
 * retourne les inscriptions à l'infolettre
 */
function icms_infolettre_getInscriptions(){

	global $wpdb;

	$query = "SELECT * FROM " . ICMS_INFOLETTRE_INSCRIPTIONS;
	$results = $wpdb->get_results( $query );

	return $results;
	
}