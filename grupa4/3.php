<!-- Napisati funkciju koja ispisuje na kom se mestu u stringu nalazi slovo ‘b’. -->

<?php

function letterB($string)
{
    $rez = strpos($string , 'b');
    $poz = [];

    if ($rez === 0) {
        echo "Slovo b se ne nalazi u datom stringu";
        return;
    }

    for ($i = 0; $i < strlen($string); $i++) {
        if ($string[$i] === 'b' || $string[$i] === 'B') {
            $poz[] = $i;
        }
    }

    $poz = implode(", " , $poz);
    echo "Slovo b se nalazi na $poz poziciji u datom stringu";
}

$string = "Napisati B funkciju koja ispisuje na kom se mestu u stringu nalazi slovo b.";
letterB($string);

?>