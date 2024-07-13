//import Modale from "./classes/modale.js";
/** ==========================
 * selection element html
 ========================== */
let modaleHTML;

 window.addEventListener('DOMContentLoaded', function(){

	modaleHTML = document.querySelector(".iil-modale");

 });


 /** ==========================
 * fonctions
 ========================== */
 /**
  * afficher modale aprèes 1 sec
  */
 function afficherModale() {

	setTimeout(function(){
		modaleHTML.classList.add("iil-modale__ouvert");
	}, 1000);
	
}


 /** ==========================
 * execution du code
 ========================== */
(function() {

	afficherModale();

})()


