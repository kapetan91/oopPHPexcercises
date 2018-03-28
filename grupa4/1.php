<!-- Napisati funkciju koja vadi svako drugo slovo u zadatom stringu, povratna vrednost treba da bude string bez tih slova. -->

<?php

function every2ndLetter($string)
{
    $newSentence = '';

    foreach (str_split($string) as $key => $character) {
        if ($key % 2 === 0) {
            $newSentence .= $character;
        }
    }
    return $newSentence;
}

echo every2ndLetter('Treba izvaditi svako drugo slovo i ponovo ispisati string.');

?>