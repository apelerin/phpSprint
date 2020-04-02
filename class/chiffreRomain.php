<?php




 function getCR($number)
    {
        $romanl = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $romann = '';
        while ($number > 0) {
            foreach ($romanl as $roman => $i) {
                if($number >= $i) {
                    $number = $number - $i;
                    $romann = $romann . $roman;
                    break;
                }
            }
        }
        echo '<p>'.$romann.'</p>';
    }

?>