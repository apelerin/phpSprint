<?php


class utilitaries
{
    public static $storiesDone = [1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12, 13, 14];
    public static $storiesToDo = [10, 15, 16];

    public static function getSmallestNbr($a, $b, $c) {
        if ($a < $b and $a < $c) {
            return $a;
        }
        else if ($b < $a and $b < $c) {
            return $b;
        }
        else {
            return $c;
        }
    }

    public static function displayListStories() {
        echo "Stories done: </br>";
        self::iterOnStories(self::$storiesDone);
        echo "Stories to do: </br>";
        self::iteronStories(self::$storiesToDo);
    }

    public static function iterOnStories($arr) {
        foreach ($arr as $story) {
            echo "Story" . $story . "</br>" ;
        }
    }

    /**
     * Method to get the date in dd/mm/yy format the number of given second in the past
     * @param $scd int number of second we want to go to the past
     * @return string date corresponding in format dd/mm/yy
     */
    public static function getDateFromSeconds($scd) {
        $date = date('m/d/Y h:i:s', time());
        $stamp = strtotime($date) - $scd;
        return date("d/m/y", $stamp);
    }

    /**
     * Convert a decimal to an hexadecimal
     * @param $nbr int number we want to convert to hexadecimal
     * @return string the result of the conversion decimal => hexadecimal
     */
    public static function convertDecToHexa($nbr) {
        $map_hexa = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F"];

        $hexa = '';
        while ($nbr >= 16) {
            $hexa = $map_hexa[$nbr % 16] . $hexa;
            $nbr = intdiv($nbr, 16);
        }
        $hexa = $map_hexa[$nbr] . $hexa;
        return $hexa;
    }
}