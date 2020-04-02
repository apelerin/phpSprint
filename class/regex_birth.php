<?php
function getRegexBirth($_Postes){

		if ( preg_match( "/^([0-3][0-9]})(/)([0-9]{2,2})(/)([0-3]{2,2})$/ " , $_Postes) )
		{
			echo "La date est valide";
		}
		else {
			echo "Ceci n'est pas une date valide";
		}
}
?>