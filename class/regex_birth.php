<?php
function getRegexBirth($_Postes){
    preg_match('/\d{2}\/\d{2}\/\d{4}/', $_Postes);
		if (preg_match('/\d{2}\/\d{2}\/\d{4}/', $_Postes)) {
			echo "La date est valide";
		}
		else {
			echo "Ceci n'est pas une date valide";
		}
}
?>