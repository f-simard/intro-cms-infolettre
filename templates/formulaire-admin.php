<div class="icms-infolettre panneau-admin configuration">
    <h1><?php echo get_admin_page_title(); ?></h1>
    <form class="formulaire-admin" action="" method="post">
		<div>
			<label for="icms-infolettre-couleur-bg">Couleur de fond</label>
			<input type="color" name="icms-infolettre-couleur-bg" id="icms-infolettre-couleur-bg" value="<?php echo esc_attr( $parametres->couleur_bg); ?>">
		</div>
		<div>
			<label for="icms-infolettre-couleur-txt">Couleur du texte</label>
			<input type="color" name="icms-infolettre-couleur-txt" id="icms-infolettre-couleur-txt" value="<?php echo esc_attr( $parametres->couleur_txt); ?>">
		</div>
		<div>
			<label for="icms-infolettre-param-titre">Titre de l'infolettre</label>
			<input type="text" name="icms-infolettre-param-titre" id="icms-infolettre-param-titre" value="<?php echo esc_attr( $parametres->titre); ?>">
		</div>
		<div>
			<label for="icms-infolette-etiquette-nom">Intitulé pour le champ <i>Nom</i></label>
			<input type="text" name="icms-infolettre-param-nom" id="icms-infolettre-param-nom" value="<?php echo esc_attr( $parametres->nom); ?>">
		</div>
		<div>
			<label for="icms-infolette-etiquette-courriel">Intitulé pour le champ <i>Courriel</i></label>
			<input type="text" name="icms-infolettre-param-courriel" id="icms-infolettre-param-courriel" value="<?php echo esc_attr( $parametres->courriel); ?>">
		</div>
		<div>
			<label for="icms-infolette-etiquette-suivant">Intitulé pour le bouton <i>Suivant</i></label>
			<input type="text" name="icms-infolettre-param-prochain" id="icms-infolettre-param-prochain" value="<?php echo esc_attr( $parametres->btn_prochain); ?>">
		</div>
		<div>
			<label for="icms-infolette-etiquette-soumettre">Intitulé pour le bouton <i>Soumettre</i></label>
			<input type="text" name="icms-infolettre-param-soumission" id="icms-infolettre-param-soumission" value="<?php echo esc_attr( $parametres->btn_soumission); ?>">
		</div>
		<input type="submit" name='icms-infolettre-enregistrer' value="Enregistrer" value="<?php ?>">
	</form>
</div>
