<!-- U zadatom nizu brojeva, napisi koliko suseda ima istu vrednost, i ispisi koje su to vrednosti.
npr. za zadati niz 1, 5, 5, 4, 6, 7, 7, 4, 4 treba ispisati: Postoje 3  grupe suseda koja imaju iste vrednosti. Te vrednosti su: 5, 7, 4. -->

<?php

function countingNeighborsWithSameValue($arr)
{
    $counter = 0;
    $newArr = [];
    $string = '';

    for ($i = 0; $i < count($arr)-1; $i++) {
        if ($arr[$i] === $arr[$i + 1]) {
            $counter++;
            $newArr[] = $arr[$i];
        }
    }
    echo "Postoje " , $counter , " groupe suseda koje imaju iste vredosti \n";

    for ($i = 0; $i < count($newArr); $i++) {
        $string .= " $newArr[$i], ";
    }
    echo "Te vrednosti su $string";

}

$arr = [1, 5, 5, 4, 6, 7, 7, 4, 4];
countingNeighborsWithSameValue($arr);

?>