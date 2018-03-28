<!-- Napisati funkciju koji prolazi kroz sve brojeve od 1 do 30, i ukoliko je broj deljiv sa 3 ispisuje ‘foo’,
ukoliko je broj deljiva sa 5 ispisuje ‘bar’, a ukoliko je broj deljiv i sa 3 i sa 5 ispisuje ‘foobar’. -->

<?php

function fooBar()
{
    for ($i = 1; $i <= 30; $i++) {
        if ($i % 3 === 0 && $i % 5 === 0) {
            echo $i , " foobar \n";
        } elseif ($i % 3 === 0) {
            echo $i , " foo \n";
        } elseif ($i % 5 === 0) {
            echo $i , " bar \n";
        }
    }
}

fooBar();

?>