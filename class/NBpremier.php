<?php

function affichePremiers($n){
        echo "Les nombres premiers entre 0 et ".$n." sont : ";
        echo " | ";
        $negatif = false;
        if($n<0){
            $negatif = true;
            $n = -$n;
        }
        
        for($i=2;$i<=$n;$i++){
            $nbDiv = 0;   
            for($j=1;$j<=$i;$j++){
                if($i%$j==0){
                    $nbDiv++;            
                }
            }
            if($nbDiv == 2){
    
                if($negatif){
                    echo "0";
                }
                echo $i." | ";
            }
        }
    }
?>

