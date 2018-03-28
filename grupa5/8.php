<!-- Napisati funkciju koji nalazi sve parove niza, cija je suma jednaka zadatom broju.
Npr ako je zadati broj 10, i imamo niz = [2, 7, 8, 4, 3], rezultat treba da ispise 2 i 8, i 7 i 3. -->

<?php

function  findingPairs($arr, $number)
{
    $newArr = [];
    for ($i = 0; $i < count($arr); $i++) {
        for ($j = $i + 1; $j < count($arr); $j++) {
            if ($arr[$i] + $arr[$j] === $number) {
                $newArr[] = [$arr[$i] , $arr[$j]];
            }
        }
    }
    print_r($newArr);
}

$arr = [2, 7, 8, 4, 3];
$number = 10;
 findingPairs($arr, $number);

?>
