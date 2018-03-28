<!-- Napisati funkciju, koja elemente zadatog niza modifikuje tako da njegove nove vrednosti budu kvadratni koren prethodne vrednosti. -->

<?php

function squareRoot($arr)
{
    foreach ($arr as $key => $value) {
        $arr[$key] = sqrt($value);
    }

    print_r($arr);
}

$arr = [4, 9, 16, 25, 36];
squareRoot($arr);

?>