<!-- Napisati funkciju koja vraca prvih 20 karaktera nekog stringa. -->

<?php

function first20Char($string)
{
    echo substr($string, 0 , 20);
}

$string = "Napisati funkciju koja vraca prvih 20 karaktera nekog stringa.";
first20Char($string);

?>