<!-- Napisati funkciju koja ispisuje zadati niz u obrnutom redosledu. -->

<?php

function invertedOrder($arr)
{
    $newArr = [];
    for ($i = count($arr)-1; $i >= 0 ; $i--) {
        $newArr[] = $arr[$i];
    }
    print_r($newArr);
}

$arr = [1, 2, 12, 4, 5];
invertedOrder($arr);

?>