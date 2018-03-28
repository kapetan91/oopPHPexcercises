<!-- Napisati funkciju koji racuna broj parnih brojeva izmedju 1 i 30. -->

<?php

function countingHowManyNumbers()
{
    $counter = 0;
    for ($i = 1; $i <= 30; $i++) {
        if ($i % 2 === 0) {
            $counter++;
        }
    }

    return $counter;
}

echo "Counter = " , countingHowManyNumbers();

?>