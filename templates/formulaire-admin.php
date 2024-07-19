<div class="iil-panneau-admin">
    <h1><?php echo get_admin_page_title(); ?></h1>
    <form class="ill-formulaire__admin" action="" method="post">
		<div>
			<label for="iil-couleur-bg">Couleur de fond</label>
			<input type="color" name="iil-couleur-bg" id="iil-couleur-bg" value="<?php echo esc_attr( $parametres->couleur_bg ); ?>">
		</div>
		<div>
			<label for="iil-couleur-txt">Couleur du texte</label>
			<input type="color" name="iil-couleur-txt" id="iil-couleur-txt" value="<?php echo esc_attr( $parametres->couleur_txt ); ?>">
		</div>
		<div>
			<label for="iil-param-titre">Titre de l'infolettre</label>
			<input type="text" name="iil-param-titre" id="iil-param-titre" value="<?php echo esc_attr( $parametres->titre ); ?>">
		</div>
		<div>
			<label for="icms-infolette-etiquette-nom">Intitulé pour le champ <i>Nom</i></label>
			<input type="text" name="iil-param-nom" id="iil-param-nom" value="<?php echo esc_attr( $parametres->nom ); ?>">
		</div>
		<div>
			<label for="icms-infolette-etiquette-courriel">Intitulé pour le champ <i>Courriel</i></label>
			<input type="text" name="iil-param-courriel" id="iil-param-courriel" value="<?php echo esc_attr( $parametres->courriel ); ?>">
		</div>
		<div>
			<label for="icms-infolette-etiquette-suivant">Intitulé pour le bouton <i>Suivant</i></label>
			<input type="text" name="iil-param-prochain" id="iil-param-prochain" value="<?php echo esc_attr( $parametres->btn_prochain ); ?>">
		</div>
		<div>
			<label for="icms-infolette-etiquette-soumettre">Intitulé pour le bouton <i>Soumettre</i></label>
			<input type="text" name="iil-param-soumission" id="iil-param-soumission" value="<?php echo esc_attr( $parametres->btn_soumission ); ?>">
		</div>
		<input type="submit" name='iil-enregistrer' value="Enregistrer" value="<?php ?>">
	</form>
</div>
