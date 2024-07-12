
<?php

/**
 * ajoute menu dans l'interface administrateur et insere les formulaires
 */
function icms_infolettre_ajouter_menu() {

	add_menu_page(
	"ICMS Modale Infolettre", // Page title
	'ICMS Infolettre', // Menu title
	'manage_options', // Capability
	'icms-infolettre-menu-page', // Menu slug
	'icms_infolettre_ajouter_formulaire' // Callable function
	);

}
add_action( 'admin_menu', 'icms_infolettre_ajouter_menu' );


/**
 * injecte un formulaire dans panneau admin du plugin
 */
function icms_infolettre_ajouter_formulaire() {

	if( isset ($_POST['icms-infolettre-enregistrer']) ) {
		icms_infolettre_update_params();
	}

	icms_infolettre_charger_formulaire();
	icms_infolettre_charger_inscription();

	//require_once('icms-infolettre-get-data.php');
	//mpp_afficher_data(); // Appelle la fonction qui affiche les datas
}


/**
 * charge le formulaire pour configurer l'infolettre et la valeur de chaque paramètres dans la base données
 */
function icms_infolettre_charger_formulaire() {

	//récuprer la valeur des paramètres dans la base données
	require_once('icms-infolettre-get-data.php');
	$parametres = icms_infolettre_getParams();

	//afficher la données dans le formulaire
	ob_start();
	include( dirname(plugin_dir_path( __FILE__ )) . '/templates/formulaire-admin.php' );
	$template = ob_get_clean();
	echo $template;
}


/**
 * charge le gabarit pour la liste des inscriptions à l'infolettre
 */
function icms_infolettre_charger_inscription() {

	//récuprer la liste d'inscriptions dans la base données
	require_once( 'icms-infolettre-get-data.php' );
	$inscriptions = icms_infolettre_getInscriptions();

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
function icms_infolettre_update_params() {
	global $wpdb;

	$icms_infolettre_couleur_bg = sanitize_hex_color( $_POST['icms-infolettre-couleur-bg'] );
	$icms_infolettre_couleur_txt = sanitize_hex_color( $_POST['icms-infolettre-couleur-txt'] );
	$icms_infolettre_param_titre = sanitize_text_field( $_POST['icms-infolettre-param-titre'] );
	$icms_infolettre_param_nom = sanitize_text_field( $_POST['icms-infolettre-param-nom'] );
	$icms_infolettre_param_courriel = sanitize_text_field( $_POST['icms-infolettre-param-courriel'] );
	$icms_infolettre_param_prochain = sanitize_text_field( $_POST['icms-infolettre-param-prochain'] );
	$icms_infolettre_param_soumission = sanitize_text_field( $_POST['icms-infolettre-param-soumission'] );

	$data = [	'couleur_bg' => $icms_infolettre_couleur_bg,
				'couleur_txt' => $icms_infolettre_couleur_txt,
				'titre' => $icms_infolettre_param_titre,
				'nom' => $icms_infolettre_param_nom,
				'courriel' => $icms_infolettre_param_courriel,
				'btn_prochain' => $icms_infolettre_param_prochain,
				'btn_soumission' => $icms_infolettre_param_soumission,
				];
	$where = ['id' => 1];

	$wpdb->update( ICMS_INFOLETTRE_PARAMETRES, $data, $where );
}