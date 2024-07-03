<?php

/**
 * Ajoute une table wp_mon_premier_plugin à la base de données à l'activation du plugin
 */
function icms_infolettre_activation() {
	// constante globale qui represente la connexion à la base de données
	// fourni par l'api wordpress
	global $wpdb;

	$charset_collate = $wpdb->get_charset_collate();

	/**
	 * table de parametre de couleur de fond
	 */
	$table_parametres = $wpdb->prefix . 'icms_infolettre_parametres';

	if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_parametres'" ) != $table_parametres ) {

		$sql = "CREATE TABLE $table_parametres (
			id int NOT NULL AUTO_INCREMENT,
			couleur_bg varchar(10) NOT NULL,
			couleur_txt varchar(10) NOT NULL,
			titre varchar(50) NOT NULL,
			etiquette_nom varchar(50) NOT NULL,
			etiquette_courriel varchar(50) NOT NULL,
			etiquette_suivant varchar(50) NOT NULL,
			etiquette_soumettre varchar(50) NOT NULL,

			PRIMARY KEY (id)
			) $charset_collate";

		//require once pour aller chercher dbDelta()
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );

		$wpdb->insert($table_parametres, array(	'couleur_bg' => '#ffffff',
												'couleur_txt' => '#000000',
												'titre' => 'Inscrivez-vous à notre infolettre !',
												'etiquette_nom' => 'Nom',
												'etiquette_courriel' => 'Courriel',
												'etiquette_suivant' => 'Suivant',
												'etiquette_soumettre' => 'Soumettre'
											));
		}

	/**
	 * table d'inscription
	 */
	$table_inscriptions = $wpdb->prefix . 'icms_infolettre_inscriptions';
	
	if ( $wpdb->get_var( "SHOW TABLES LIKE '$table_inscriptions'" ) != $table_inscriptions ) {
		$sql = "CREATE TABLE $table_inscriptions (
			id int NOT NULL AUTO_INCREMENT,
			nom varchar(100) NOT NULL,
			courriel varchar(100) NOT NULL,

			PRIMARY KEY (id)
			) $charset_collate";

		//require once pour aller chercher dbDelta()
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}

}