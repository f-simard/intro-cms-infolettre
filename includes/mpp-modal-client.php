<?php


// function mpp_chargeModale(){
	
// 	require_once( 'mpp-get-couleur.php' );
// 	$mpp_couleur_bg = mpp_get_couleur_bg();
	
// 	ob_start();
// 	include( dirname ( plugin_dir_path( __FILE__ ) ) . '/templates/inscription.php' );
// 	$template = ob_get_clean();
// 	echo $template;

// }

// add_action('wp_body_open', 'mpp_chargeModale');


// /**
//  * Gestion de la soumission du formulaire côté client
//  */
// function mpp_nouvelle_inscription() {

//     if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        
//         if ( !empty( $_POST['mpp-courriel'] ) ) {

//             global $wpdb;

//             $mpp_courriel = sanitize_email( $_POST['mpp-courriel'] );

//             $wpdb->insert( MPP_INSCRIPTIONS,
//                 array(
//                     'courriel' => $mpp_courriel
//                 ), array(
//                     '%s'        // $format (optionnel) => string
//                 )
//             );

//             /**
//              * Rafraîchi la page pour faire la communication client serveur
//              * Détruit la variable spécifiée
//              * exit pour stopper l'exécution de la suite du code
//              */
//             header( "Location: http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]" );
//             unset( $_POST );
//             exit;
//         }
//     }
// }
// add_action( 'init', 'mpp_nouvelle_inscription' );