<?php

$a = $_GET['a'];
$b = $_GET['b'];
$c = $a * $b;

/*echo "Lutfi GODOK <br>";

echo " Hasil Perkalian dari {$a} dan {$b} = {$c} <br>";
echo ' Total perkalian '. $a . ' dan '. $b. ' = '. $c;*/

//Mengoutputkan dalam JSON

$reply = [
    'perkalian' => [
        'a' => $a,
        'b' => $b,
        'hasil' => $c
    ]
];

header('Content-Type: application/json');
echo json_encode($reply);
