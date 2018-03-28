<!-- Napisati funkciju koja ubacuje novi element u nizu, na drugo mesto sa kraja. -->

<?php

function newElement($arr, $num)
{
    array_splice($arr, -1, 0, $num);
    print_r($arr);
}

$arr = [1, 2, 3, 4, 5, 6];
$num = 7;

newElement($arr, $num);

?>