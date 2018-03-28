<!-- Napisati funkciju koja iz zadatog niza uzima prva tri elementa, i pretvara ih u string, kod kojeg svaka rec zapocinje velikim slovom. -->

<?php

function firstThreeElements($arr)
{
    $firstThree = array_slice($arr , 0, 3);
    return ucwords(implode(' ', $firstThree));
}
$arr = ['prva', 'tri', 'clana', 'niza'];
echo firstThreeElements($arr);

?>