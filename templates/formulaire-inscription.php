<div class="iil-modale" 
		style="background-color:<?php echo esc_attr($iil_modale_params->couleur_bg); ?> ; color:<?php echo esc_attr($iil_modale_params->couleur_txt); ?>">
    <form action="" method="post" style="background-color:<?php echo esc_attr($iil_modale_params->couleur_bg); ?> ; color:<?php echo esc_attr($iil_modale_params->couleur_txt); ?>">
		<section class="ill-formulaire__section">
			<h2 style="color:<?php echo esc_attr($iil_modale_params->couleur_txt); ?>"><?php echo esc_html($iil_modale_params->titre); ?></h2>
			<div class="ill-formulaire_input">
				<div class = "paire">
					<label for="ill-nom"><?php echo esc_html($iil_modale_params->nom); ?></label>
					<input type="text" name="iil-nom" id="iil-nom">
				</div>
				<button><?php echo esc_html($iil_modale_params->btn_prochain); ?></button>
			</div>
		</section>
		<section class="ill-formulaire__section">
			<h2 style="color:<?php echo esc_attr($iil_modale_params->couleur_txt); ?>"><?php echo esc_html($iil_modale_params->titre); ?></h2>
			<div class="ill-formulaire_input">
				<div class = "paire">
					<label for="iil-courriel"><?php echo esc_html($iil_modale_params->courriel); ?></label>
					<input type="email" name="iil-courriel" id="iil-courriel">
				</div>
				<button><?php echo esc_html($iil_modale_params->btn_prochain); ?></button>
			</div>
		</section>
		<section>
			<h2 style="color:<?php echo esc_attr($iil_modale_params->couleur_txt); ?>"><?php echo esc_html($iil_modale_params->titre); ?></h2>
			<input type="submit" name="iil-insc-soumettre" value="<?php echo esc_attr($iil_modale_params->btn_soumission); ?>">
		</section>
    </form>
</div>