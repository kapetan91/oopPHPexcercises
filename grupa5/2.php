<!-- Napisati funkciju koja brojeve izmedju 1 i 30 smesta u novi niz i ispisuje niz na ekranu. -->

<?php

function creatingArr()
{
    $newArr = [];
    for ($i = 1; $i <= 30; $i++) {
        $newArr[] = $i;
    }
    return $newArr;
}

print_r(creatingArr());

?>
