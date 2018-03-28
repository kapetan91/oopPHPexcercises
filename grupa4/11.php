<!-- Napisati funkciju koja u zadatom asocijativnom nizu, pronalazi element sa najduzim kljucem i zamenjuje
njegovu vrednost sa stringom ‘Ovde je najduzi indeks’. Ispisati novokreirani niz. -->

<?php

function getLongestKey($arr)
{
    $longestKey = 0;
    $k = '';

    foreach ($arr as $key => $value) {
        if ($longestKey <= strlen($key)) {
            $longestKey = strlen($key);
            $k = $key;
        }
    }

    $arr[$k] = "Ovde je najduzi kljuc";
    var_dump($arr);
}

$arr = [
    'prviElement' => 'prvaVrednost',
    'drugiElement' => 'drugaVrednost',
    'treciElement' => 'trecaVrednost',
    'ubedljivoNajduziKey' => 'cetvrtaVrednost',
    'petiElement' => 'petaVrednost'
];

getLongestKey($arr);

?>