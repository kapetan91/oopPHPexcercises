<!-- Napisati funkciju koja vraca najzastupljeniji karakter u zadatom stringu. -->

<?php

function mostCommonChar($string)
{
    $lenght = strlen($string);
    $num = 0;
    $letter = '';

    for ($i = 0; $i < $lenght; $i++) {
        $a = substr($string, $i, 1);
        $b = substr_count($string, $a, 0) . "\n";
            if ($num <= $b) {
                $num = $b;
                $letter = $a;
            }
    }

    echo "Najzastupljeniji karakter je \"$letter\" i ponavlja se $num puta.";

}

$string = 'Napisati funkciju koja vraca najzastupljeniji karakter u stringu.';
mostCommonChar($string);

?>