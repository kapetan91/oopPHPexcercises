<!-- Napisati funkciju koja racuna zbir cifara nekog broja. Npr ako je zadati broj 14, rezultat je 5. A ako je zadati broj 123, rezultat je 6. -->

<?php

function counting($number)
{
    $sum = 0;
    do {
        $sum += $number % 10;
    }
    while ($number = (int) $number / 10);

    return $sum;
}

echo counting(123456789);

?>