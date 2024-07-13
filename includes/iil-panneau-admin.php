
<?php

/**
 * ajoute menu dans l'interface administrateur et insere les formulaires
 */
function iil_ajouter_menu() {

	add_menu_page(
	"ICMS Modale Infolettre", // Page title
	'ICMS Infolettre', // Menu title
	'manage_options', // Capability
	'iil-menu-page', // Menu slug
	'iil_ajouter_formulaire' // Callable function
	);

}
add_action( 'admin_menu', 'iil_ajouter_menu' );


/**
 * injecte un formulaire dans panneau admin du plugin
 */
function iil_ajouter_formulaire() {

	if( isset ($_POST['iil-enregistrer']) ) {
		iil_update_params();
	}

	iil_charger_formulaire();
	iil_charger_inscription();

}


/**
 * charge le formulaire pour configurer l'infolettre et la valeur de chaque paramètres dans la base données
 */
function iil_charger_formulaire() {

	//récuprer la valeur des paramètres dans la base données
	require_once('iil-get-data.php');
	$parametres = iil_getParams();

	//afficher la données dans le formulaire
	ob_start();
	include( dirname(plugin_dir_path( __FILE__ )) . '/templates/formulaire-admin.php' );
	$template = ob_get_clean();
	echo $template;

}


/**
 * charge le gabarit pour la liste des inscriptions à l'infolettre
 */
function iil_charger_inscription() {

	//récuprer la liste d'inscriptions dans la base données
	require_once( 'iil-get-data.php' );
	$inscriptions = iil_getInscriptions();

	//afficher la liste d'inscriptions s'il y a au moins une inscription
	if( !empty( $inscriptions ) ) {
		ob_start();
		include( dirname( plugin_dir_path( __FILE__ ) ) . '/templates/liste-inscription.php' );
		$template = ob_get_clean();
		echo $template;
	}

}


/**
 * met à jour les configurations d'infolettre dans la base de données
 */
function iil_update_params() {

	global $wpdb;

	$iil_couleur_bg = sanitize_hex_color( $_POST['iil-couleur-bg'] );
	$iil_couleur_txt = sanitize_hex_color( $_POST['iil-couleur-txt'] );
	$iil_param_titre = sanitize_text_field( $_POST['iil-param-titre'] );
	$iil_param_nom = sanitize_text_field( $_POST['iil-param-nom'] );
	$iil_param_courriel = sanitize_text_field( $_POST['iil-param-courriel'] );
	$iil_param_prochain = sanitize_text_field( $_POST['iil-param-prochain'] );
	$iil_param_soumission = sanitize_text_field( $_POST['iil-param-soumission'] );

	$data = [	'couleur_bg' => $iil_couleur_bg,
				'couleur_txt' => $iil_couleur_txt,
				'titre' => $iil_param_titre,
				'nom' => $iil_param_nom,
				'courriel' => $iil_param_courriel,
				'btn_prochain' => $iil_param_prochain,
				'btn_soumission' => $iil_param_soumission,
				];
	$where = ['id' => 1];

	$wpdb->update( IIL_PARAMETRES, $data, $where );
	
}