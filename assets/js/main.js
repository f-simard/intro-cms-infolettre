//import Modale from "./classes/modale.js";
/** ==========================
 * selection element html
 ========================== */
let modaleHTML;
let formulaireInscriptionHTML;
let indexPanneauCourant = 0;

let panneauHTML;
let champsHTML;
let boutonsHTML;
let boutonSoumettreHTML;


 /** ==========================
 * fonctions
 ========================== */

 /**
  * fonction d'initialisation pour le formulaire d'inscription 
  */
function init() {

	// affectation des variables après que le formulaire soit chargé
	//FIXME: porter de la variable
	window.addEventListener( 'DOMContentLoaded' , function() {

		modaleHTML = document.querySelector( ".iil-modale" );
		formulaireInscriptionHTML = document.querySelector( ".iil-formulaire__inscription" );
		panneauHTML = formulaireInscriptionHTML.querySelectorAll( "[data-panneau]" );
		boutonsHTML = formulaireInscriptionHTML.querySelectorAll( "button" );
		boutonSoumettreHTML = formulaireInscriptionHTML.querySelector("input[type='submit'");
	
	 });

	 //attendre que le dom soit chargé
	 //solution src: chatgpt - defi: utilisation de la valeur des assignations des variables en dehors du eventListener sur windows.
	 setTimeout(function() {
		//prevenir la soumission avant la validation du formulaire
		formulaireInscriptionHTML.addEventListener( "submit" , bloquerSoumission);

		//afficher seulement le premier panneau
		panneauHTML.forEach(function(panneau) {
			cacherPanneau(panneau);
		})
		afficherPanneau( panneauHTML[ indexPanneauCourant ]);

		//affiche le prochain panneau si la section est valide au clique du bouton suivant
		boutonsHTML.forEach(function(bouton) {
			bouton.addEventListener( "click" , onCliqueBouton);

		});

		//soumettre le formulaire lorsque le bouton de soumission est cliqué
		boutonSoumettreHTML.addEventListener("click", soumettreInscription);

	 },100);

	 
	//afficher le premier panneau de la modale pour inscription avec le delais
	afficherModale();

	//soumettre formulaire

}

 /**
  * afficher modale aprèes 1 sec
  */
 function afficherModale() {

	setTimeout(function(){
		modaleHTML.classList.add("iil-modale__ouvert");
	}, 1000);

}

/**
 * cacher les panneaux
 */
function cacherPanneau(panneau) {

	panneau.classList.add("invisible");

}


/**
 * afficher un panneau selon son index
 */
function afficherPanneau(panneau) {

	panneau.classList.remove("invisible");

}


/**
 * prevenir la soumission du formulaire par default
*/
function bloquerSoumission(evenement){

	evenement.preventDefault();

}


/**
 * valider la section du formulaire.
 * Puisque chaque panneau contient seulement 1 champ, si le champ est valide, la section est valide
 */
function validerSectionFormulaire(panneau) {

	const champsPanneau = panneau.querySelector("input");
	const estValide = champsPanneau.checkValidity();

	return estValide;

}


/**
 * affiche le prochain panneau si la section est valide
 */
function onCliqueBouton(evenement) {


	const panneauACacher = evenement.currentTarget.closest("[data-panneau]");
	let panneauValide = validerSectionFormulaire(panneauACacher);

	if( panneauValide ) {
		cacherPanneau(panneauACacher);

		//augmenter panneau courant et l'afficher
		indexPanneauCourant++;
		afficherPanneau(panneauHTML[indexPanneauCourant])
	}

}


/**
 * soumettre les informations à la base de données
 */
function soumettreInscription(){
	formulaireInscriptionHTML.submit();
}


 /** ==========================
 * execution du code
 ========================== */
 init();
