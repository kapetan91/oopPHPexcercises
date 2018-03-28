<!-- Napisati funkciju koja zamenjuje mesta prvoj i poslednjoj reci u zadatom stringu, i ispisuje novokreirani string. -->

<?php

function firstAndLastWord($string)
{
    $arr = explode(' ', $string);
    $num = count($arr);
    $temp = $arr[0];
    $arr[0] = $arr[$num - 1];
    $arr[$num - 1] = $temp;

    return implode(" ", $arr);
}

$string = 'Zamenjuje prvu i poslednju rec.';
echo $string , "\n";
echo firstAndLastWord($string);

?>