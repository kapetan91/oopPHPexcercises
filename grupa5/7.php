<!-- Napisati funkciju koji nalazi drugi najveci broj u nizu (znaci ne maksimum, vec drugi najveci). -->

<?php

function findinng2ndBiggestNum($array)
{
    $max_1 = 0;
    $max_2 = 0;

    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] > $max_1) {
            $max_2 = $max_1;
            $max_1 = $array[$i];
        } else if ($array[$i] > $max_2) {
            $max_2 = $array[$i];
        }
    }

    return $max_2;
}

$arr = [1, 10, 9, 1, 20, 32, 31];
echo "Drugi najveci br je " , findinng2ndBiggestNum($arr) , "!";

?>