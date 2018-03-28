<!-- U zadatom nizu brojeva, pronadji najmanji broj koji je deljiv sa 3, uz poruku,
'U zadatom nizu najmanji deljiv sa 3 je TAJITAJ, i on se nalazi na poziciji TOJITOJ'.  -->

<?php

function smallestDivWith3($arr)
{
    $num = 0;
    $poz = null;
    $string = '';

    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] > $num) {
            $num = $arr[$i];
        }
    }

    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] % 3 === 0) {
            if ($arr[$i] < $num) {
                $num = $arr[$i];
                $poz = $i;
            }
        }
    }

    return $string .= "U zadatom nizu najmanji deljiv je $num i nalazi se na poziciji $poz.";
}

$arr = [1, 5, 8, 9, 3, 4, 12];
echo smallestDivWith3($arr);

?>
