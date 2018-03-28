<!-- Napisati funkciju koja izracunava presek dva asocijativna niza, a zatim ispisuje vrednost najduzeg elementa. -->

<?php

function  intersection($arr1, $arr2)
{
    $intersect = array_intersect($arr1 , $arr2);
    $longest = array_map('strlen', $intersect);
    echo "Najduzi je " , max($longest);
}

$arr1 = [
    'prviElement' => 'prvaVrednost',
    'drugiElement' => 'drugaVrednost',
    'treciElement' => 'trecaVrednost',
    'cetvrtiElement' => 'cetvrtaVrednost',
    'petiElement' => 'petaVrednost'
];

$arr2 = [
    'prviElement' => 'prvaVrednost',
    'BlaBla' => 'BlaBla',
    'treciElement' => 'trecaVrednost',
    'fooBar' => 'barFoo',
];

 intersection($arr1, $arr2);

?>