class Modale {

	constructor(){
	
		this.afficherModale();
	}



	/**
	 * afficher modale apres un délais de 1 seconde
	 */
	afficherModale() {
		window.addEventListener('DOMContentLoaded', function(){

			setTimeout(function(){
				this.classList.add("iil-modale__ouvert");
			}, 1000);
		}.bind(this));
	}
}

export default Modale;