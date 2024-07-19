<?php

/**
 * retourne les parametres personnalisables de la modale
 */
function iil_getParams(){

	global $wpdb;

	$query = "SELECT * FROM " . IIL_PARAMETRES . " WHERE id=1";
	$results = $wpdb->get_results( $query );

	return $results[ 0 ];
	
}


/**
 * retourne les inscriptions à l'infolettre
 */
function iil_getInscriptions(){

	global $wpdb;

	$query = "SELECT * FROM " . IIL_INSCRIPTIONS;
	$results = $wpdb->get_results( $query );

	return $results;
	
}