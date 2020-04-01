<?php


class utilitaries
{
    public static $storiesDone = [1, 2, 3];
    public static $storiesToDo = [4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16];

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

    //todo A more algorithmic approach
    public static function getDateFromSeconds($scd) {
        $date = date('m/d/Y h:i:s', time());
        $stamp = strtotime($date) - $scd;
        return date("d/m/y", $stamp);
    }
}