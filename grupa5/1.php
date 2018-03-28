<!-- Napisati funkciju koja ispisuje brojeve izmedju 1 i 30 koji su deljivi sa 3. -->

<?php

function divisibleWithThree()
{
    $string = '';
    for ($i = 1; $i <= 30 ; $i++) {
        if ($i % 3 === 0) {
            $string .= "$i, ";
        }
    }
    echo "Broj 3 je deljiv sa sledecim brojevima $string";
}

divisibleWiththree();

?>