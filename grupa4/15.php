<!-- Napisati funkciju koja na osnovu zadatog asocijativnog niza kreira novi niz, uzimajuci u obzir samo elemente kod kojih je duzina kljuca parna. -->


<?php

function  creatingNewArr($arr)
{
    var_dump(array_filter($arr, function($num) {
        return strlen($num) % 2 == 0;
    }, ARRAY_FILTER_USE_KEY));
}

$arr = [
    'prviElement' => 'prvaVrednost',
    'drugiElement' => 'drugaVrednost',
    'treciElement' => 'trecaVrednost',
    'cetvrtiElement' => 'cetvrtaVrednost',
    'petiElement' => 'petaVrednost'
];

 creatingNewArr($arr);

?>