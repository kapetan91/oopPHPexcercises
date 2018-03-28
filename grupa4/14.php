<!-- Napisati funkciju koja na osnovu zadatog asocijativnog niza kreira novi niz, uzimajuci u obzir samo elemente koji su parni. -->


<?php

function creatingArray($arr)
{
    function even($var)
    {
        return $var % 2 === 0;
    }

    print_r(array_filter($arr, "even"));
}

$arr = [
    'a' => 1,
    'b' => 2,
    'c' => 3,
    'd' => 4
];

creatingArray($arr);

?>