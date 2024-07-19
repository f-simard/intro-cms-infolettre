<div class="iil-modale" style="background-color:<?php echo esc_attr( $iil_modale_params->couleur_bg ); ?> ; color:<?php echo esc_attr( $iil_modale_params->couleur_txt ); ?>">
	<div class="iil-modale__boutonFermer">&#10006;</div>
	<form action="" method="post" class="iil-formulaire__inscription" style="background-color:<?php echo esc_attr( $iil_modale_params->couleur_bg ); ?> ; color:<?php echo esc_attr( $iil_modale_params->couleur_txt ); ?>">
		<section class="ill-formulaire__section" data-panneau=0 >
			<h2 style="color:<?php echo esc_attr( $iil_modale_params->couleur_txt ); ?>"><?php echo esc_html( $iil_modale_params->titre ); ?></h2>
			<div class="ill-formulaire_input">
				<div class = "paire">
					<label for="iil-nom"><?php echo esc_html( $iil_modale_params->nom ); ?></label>
					<input required type="text" name="iil-nom" id="iil-nom"  minlenght=3 maxlength=255 pattern="[A-Za-z]{3,}">
				</div>
				<button><?php echo esc_html( $iil_modale_params->btn_prochain ); ?></button>
			</div>
		</section>
		<section class="ill-formulaire__section" data-panneau=1 >
			<h2 style="color:<?php echo esc_attr( $iil_modale_params->couleur_txt ); ?>"><?php echo esc_html( $iil_modale_params->titre ); ?></h2>
			<div class="ill-formulaire_input">
				<div class = "paire">
					<label for="iil-courriel"><?php echo esc_html($iil_modale_params->courriel); ?></label>
					<input required type="email" name="iil-courriel" id="iil-courriel" pattern="^^[\w\-\.]+@([\w\-]+\.)+[\w\-]{2,4}$">
					<!-- src reg ex: https://regexr.com/3e48o + chatGPT to escape the backslash -->
				</div>
				<button><?php echo esc_html( $iil_modale_params->btn_prochain ); ?></button>
			</div>
		</section>
		<section data-panneau=2>
			<h2 style="color:<?php echo esc_attr( $iil_modale_params->couleur_txt ); ?>"><?php echo esc_html( $iil_modale_params->titre ); ?></h2>
			<input type="submit" name="iil-insc-soumettre" value="<?php echo esc_attr($iil_modale_params->btn_soumission); ?>">
		</section>
	</form>
</div>