<?php
function getBinaire($_POSTE){
	$a='';
	while ($_POSTE>0 ) {


		if ($_POSTE %2 ==0){
			$_POSTE = $_POSTE / 2;
			if ( $a == '') {
				$a = "0".$a;
			}
			else{
			$a = "0".$a;
		}
			

		}
		else{
			$_POSTE =(($_POSTE +1)/2)-1;
			if ( $a == ''){
			$a = "1".$a;
			}
		else{
			$a = "1".$a;  
		}
			

		}
	}

	echo "le nombre en binaire est ".$a;
}

?>