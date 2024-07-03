
<?php

// /**
//  * ajoute panneau du plugin dans interface admin
//  */
// function mpp_ajouter_menu() {
// 	add_menu_page(
// 	'Mon Premier Plugin', // Page title
// 	'Mon Premier Plugin', // Menu title
// 	'manage_options', // Capability
// 	'mpp-menu-page', // Menu slug
// 	'mpp_ajouter_formulaire' // Callable function
// 	);
// 	}
// add_action( 'admin_menu', 'mpp_ajouter_menu' );


// /**
//  * injecte un formulaire dans panneau admin du plugin
//  */
// function mpp_ajouter_formulaire() {

// 	S'il y a un query string nom, ajoute sa valeur à la db
// 	if ( isset( $_POST['mpp-color-bg'] ) ) {
// 		mpp_update_data(); // Appelle la fonction pour l’appel à la db
// 		};

// 	require_once('mpp-get-couleur.php');
// 	$mpp_couleur_bg = mpp_get_couleur_bg();


// 	echo '<div style="padding:5vw;">
// 			<h2>' . get_admin_page_title() . '</h2>
// 			<form method="post" style="margin-top:25px;">
// 				<label for="mpp-color-bg">Couleur</label>
// 				<input type="color" id="mpp-color-bg" name="mpp-color-bg" value="' . esc_attr($mpp_couleur_bg) .'">
// 				<button type="submit" name="enregistrer">Enregistrer</button>
// 			</form>
// 		</div>';

// 	mpp_afficher_data(); // Appelle la fonction qui affiche les datas
// }

// function mpp_update_data(){
// 	global $wpdb;

// 	$mpp_couleur_bg = sanitize_hex_color( $_POST['mpp-color-bg'] );
	
// 	1 - nom de colonne dans bd
// 	$data = ['couleur_bg' => $mpp_couleur_bg];
// 	$where = ['id' => 1];

// 	$wpdb->update( MPP_PARAMETRES, $data, $where);
// }

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
