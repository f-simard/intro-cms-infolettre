<div class="iil-panneau-admin" >
    <h1>Usagers inscris à l'infolettre</h1>
	<table>
		<tr>
			<th>Nom</th>
			<th>Courriel</th>
		</tr>
		<?php
		foreach( $inscriptions as $inscription ) {
		?>
			<tr>
				<td><?php echo esc_html( $inscription->nom );?></td>
				<td><?php echo esc_html( $inscription->courriel );?></td>
			</tr>
		<?php
		}
		?>
	</table>
</div>