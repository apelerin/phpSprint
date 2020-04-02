<?php

function getRegex($_POSTES){

	if ( preg_match ( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $_POSTES) )
	{
		echo "L'adresse eMail est valide";
	}
	else{
		echo "ne me prend pas pour un con ";
	}
}

?>