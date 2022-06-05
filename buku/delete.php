<?php

include "../koneksi.php";

$isbn = $_POST['isbn'];

//Persiapan Query

$deleteDisplay = "select * from buku where isbn = {$isbn}";

/**
 * @var $connection PDO
 */


$statement2 = $connection->query($deleteDisplay);
$statement2->setFetchMode(PDO::FETCH_ASSOC);

//Jalankan Query
$resultsDelete = $statement2->fetchAll();

$query = "delete from buku where isbn = {$isbn}";
$statement = $connection->query($query);
$statement->setFetchMode(PDO::FETCH_ASSOC);
$results = $statement->fetchAll();

$output = [
    'delete' => $resultsDelete,
    'status' => 'Data Berhasil Dihapus'
];

//Output JSON
header('Content-Type: application/json');
echo json_encode($output);