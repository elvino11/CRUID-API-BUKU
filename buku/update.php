<?php

include "../koneksi.php";

//Ambil Kolom yang mau di update
$kolom = $_POST['kolom'];
$isbn = $_POST['isbn'];
$value = $_POST['value'];

//Prepare Query For Display Data Update
$updateDisplay = "select {$kolom} from buku where isbn = {$isbn}";

/**
 * @var $connection PDO
 */

$display = $connection->query($updateDisplay);
$display->setFetchMode(PDO::FETCH_ASSOC);

//jalankan Query
$resultUpdate = $display->fetchAll();


//Query Update
$query = "UPDATE buku SET {$kolom} = '{$value}' where isbn = {$isbn}";
$statement = $connection->query($query);
$statement->setFetchMode(PDO::FETCH_ASSOC);
$results = $statement->fetchAll();



//Query Hasil Update
$all = "select * from buku where isbn = {$isbn}";
$statement2 = $connection->query($all);
$statement2->setFetchMode(PDO::FETCH_ASSOC);
$results2 = $statement2->fetchAll();


$output = [
    'update' => $kolom,
    'before' => $resultUpdate,
    'after' => $value,
    'data' => $results2
];

//OUTPUT JSON
header('Content-Type: application/json');
echo  json_encode($output);