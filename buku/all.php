<?php

include '../koneksi.php';


$query = "select * from buku";

/**
 * @var $connection PDO
 */

//Persiapan (Prepare) Query
$statement = $connection->query($query);
$statement->setFetchMode(PDO::FETCH_ASSOC);


//Jalan Query
$results = $statement->fetchAll();

//modifikasi results
$output = [
    'buku' => $results
];
//Output JSON
header('Content-Type: application/json');
echo json_encode($output);