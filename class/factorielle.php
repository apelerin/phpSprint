<?php

function getFactorielle($_PostE){
	$a=$_PostE;
	$b=1;
	while ( $a>1){
	$b= $b*$a*($a-1);
	$a= $a-2;
	}

	echo "le factorielle de ".$_PostE."  est  ".$b.".";

}
?>