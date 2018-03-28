<!-- Napisati funkciju koja zadati string, pretvara u niz, tako sto ce elementi novog niza, biti duzina pojedinacih reci. -->

<?php

function makingNewArray($string)
{
    $arr = [];

    foreach (explode(" " , $string) as $value) {
        $arr[] = strlen($value);
    }

    print_r($arr);
}

$string = "Napisati funkciju koja zadati string, pretvara u niz, tako sto ce elementi novog niza, biti duzina pojedinacih reci.";
makingNewArray($string);

?>