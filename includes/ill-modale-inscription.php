
<?php


/**
 * charge la modale pour l'inscription et les parametres personalisables
 */
function iil_chargeModale() {
	
	require_once( 'iil-get-data.php' );
	$iil_modale_params = iil_getParams();
	
	ob_start();
	include( dirname ( plugin_dir_path( __FILE__ ) ) . '/templates/formulaire-inscription.php' );
	$template = ob_get_clean();
	echo $template;

}
add_action('wp_body_open', 'iil_chargeModale');


/**
 * ajoute l'usager à la table d'inscription à l'info lettre
 */
function iil_insert_inscription() {

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

		if ( !empty( $_POST[ 'iil-nom' ] ) && !empty( $_POST[ 'iil-courriel' ] ) ) {

			global $wpdb;

			$iil_nom = sanitize_text_field( $_POST[ 'iil-nom' ] );
			$iil_courriel = sanitize_email( $_POST[ 'iil-courriel' ] );

			$wpdb->insert( IIL_INSCRIPTIONS,
				array(
					'nom' => $iil_nom,
					'courriel' => $iil_courriel
				), array(
					'%s', '%s'
				)
			);

			header( "Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" );
			unset( $_POST );
			exit;
		}
	}
	
}
add_action( 'init', 'iil_insert_inscription' );