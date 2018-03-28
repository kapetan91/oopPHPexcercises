<!-- Napisati funkciju koja svakom malo slovo ‘a’ zamenjuje velikim slovom ‘A’. -->

<?php

function loverToUpper($string)
{
    return str_replace('a', 'A', $string);
}

$string = 'Svako a slovo je veliko!';
echo loverToUpper($string);

?>