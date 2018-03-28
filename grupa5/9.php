<!-- Zadati niz brojeva, razvrstavaj u nove nizove, tako sto ce jedan niz sadrzati parne, a drugi neparne brojeve. ispisi na ekran oba niza. -->


<?php

function  oddAndEven($arr)
{
    $even = [];
    $odd = [];

    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] % 2 === 0) {
            $even[] = $arr[$i];
        } else {
            $odd[] = $arr[$i];
        }
    }
    echo "Niz sa parnim je ";
    print_r($even);
    echo "\n Niz sa neparnim je ";
    print_r($odd);
}

$arr = [1, 2, 3, 4, 5, 6, 7];
 oddAndEven($arr);

?>