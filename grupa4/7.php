<!-- Napisati funkciju koja broji koliko je istovetnih elemenata niza -->

<?php

function countingSameValues($arr)
{
    print_r(array_count_values($arr));
}

$arr = [1, 'kurs', 'vivify', 1, 'vivify', 2, 5, 1];
countingSameValues($arr);

?>