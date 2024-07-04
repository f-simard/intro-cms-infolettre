
<?php

/**
 * ajoute menu dans l'interface administrateur et insere les formulaires
 */
function icms_infolettre_ajouter_menu() {
	add_menu_page(
	"Configurer l'infolettre", // Page title
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

	if( isset ($_POST['icms-infolettre-soumettre']) ) {
		icms_infolettre_update_data();
	}


	//S'il y a un query string nom, ajoute sa valeur à la db
	// if ( isset( $_POST['mpp-color-bg'] ) ) {
	// 	mpp_update_data(); // Appelle la fonction pour l’appel à la db
	// 	};


	icms_infolettre_charger_formulaire();
	icms_infolettre_charger_inscription();

	//require_once('icms-infolettre-get-data.php');
	//mpp_afficher_data(); // Appelle la fonction qui affiche les datas
}

/**
 * charge le formulaire pour configurer l'infolettre
 */
function icms_infolettre_charger_formulaire(){
	ob_start();
	include( dirname(plugin_dir_path( __FILE__ )) . '/templates/formulaire-admin.php' );
	$template = ob_get_clean();
	echo $template;
}

/**
 * charge le gabarit pour la liste des inscriptions à l'infolettre
 */
function icms_infolettre_charger_inscription(){
	ob_start();
	include( dirname(plugin_dir_path( __FILE__ )) . '/templates/liste-inscription.php' );
	$template = ob_get_clean();
	echo $template;
}



/**
 * met à jour les configurations d'infolettre dans la base de données
 */
function icms_infolettre_update_data(){
	global $wpdb;

	$icms_infolettre_couleur_bg = sanitize_hex_color( $_POST['icms-infolettre-couleur-bg'] );
	$icms_infolettre_couleur_txt = sanitize_hex_color( $_POST['icms-infolettre-couleur-txt'] );
	$icms_infolettre_titre = sanitize_text_field( $_POST['icms-infolettre-titre'] );
	$icms_infolettre_etiquette_nom = sanitize_text_field( $_POST['icms-infolettre-etiquette-nom'] );
	$icms_infolettre_etiquette_courriel = sanitize_text_field( $_POST['icms-infolettre-etiquette-courriel'] );
	$icms_infolettre_etiquette_suivant = sanitize_text_field( $_POST['icms-infolettre-etiquette-suivant'] );
	$icms_infolettre_etiquette_soumettre = sanitize_text_field( $_POST['icms-infolettre-etiquette-soumettre'] );

	$data = [	'couleur_bg' => $icms_infolettre_couleur_bg,
				'couleur_txt' => $icms_infolettre_couleur_txt,
				'titre' => $icms_infolettre_titre,
				'etiquette_nom' => $icms_infolettre_etiquette_nom,
				'etiquette_courriel' => $icms_infolettre_etiquette_courriel,
				'etiquette_suivant' => $icms_infolettre_etiquette_suivant,
				'etiquette_soumettre' => $icms_infolettre_etiquette_soumettre,
				];
	$where = ['id' => 1];

	$wpdb->update( ICMS_INFOLETTRE_PARAMETRES, $data, $where);
}

// /**
//  * afficher les données de la table dans la base de données
//  */
// function mpp_afficher_data() {
// 	global $wpdb;
// 	// Récupère les valeurs de la table wp_mon_premier_plugin
// 	$resultats = $wpdb->get_results( "SELECT * FROM " . MPP_TABLE_NAME );
// 	// S'il y a des résultats
// 	if ( $resultats ) {
// 		echo '<div style="padding:0 5vw;">
// 				<h2>Entrée(s)</h2>
// 				<ul>';
// 				foreach ( $resultats as $data ) {
// 					echo '<li><small>Nom : </small>' . esc_html( $data->nom ) . '</li>';
// 					}
// 				echo ' </ul>
// 				</div>';
// 		}
// }