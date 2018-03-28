<!-- Napisati funkciju koji u zadatom nizu ispituje da li postoji broj 5, i ako postoji, ispisuje na kojoj se
poziciji nalazi. ako ne postoji ispisuje ‘Nema broja 5.’ -->

<?php

function isThereNum5($arr)
{
    $possitions = [];
    $string = '';

    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] === 5) {
            $possitions[] = $i;
        }
    }

    if (count($possitions) > 0) {
        for ($i = 0; $i < count($possitions); $i++) {
            $string .= "$possitions[$i], ";
        }
        echo "Broj pet se nalazi na " , $string , " mestu u zadatom nizu";
    }
    else {
        echo "Nema broja 5!";
    }
}

$arr = [1, 2, 3, 5, 4, 6, 7, 5];
isThereNum5($arr);

?>