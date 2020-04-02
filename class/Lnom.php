<?php
/**
*this function take all name write in the textareas ,after she break the string of characters and give a board after the "rsort" do a revrse sort.
*implode take the board sort and glue into string 

function getLname($_POstE){
	$tab = explode ( ',',$_POstE);
	rsort($tab);
	implode( ',', $tab);
	echo $tab;

}


**/






     function getLName($liste)
    {
        $n = count($liste);
        for ($i = 0; $i < $n; $i++) {
            for ($k = $i + 1; $k < $n; $k++) {
                    if ($liste[$i][1] > $liste[$k][1]) {
                        $copy = $array[$i];
                        $liste[$i] = $liste[$k];
                        $liste[$k] = $copy;
                    }
                    }
                }
        $count=0;
        $result="";
        foreach ($liste as $v1) {
            $result=$result . "$v1";
            if($count<count($liste)-1){
                $result=$result . ",";
            }
            $count++;
        }
        echo $result;
    }


?>