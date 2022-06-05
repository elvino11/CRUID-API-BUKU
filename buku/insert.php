<?php

include "../koneksi.php";

//POST atau memgirim data nantinya dari POSTMAN contohnya ke data ini
$isbn = $_POST['isbn'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$jumlah = $_POST['jumlah'];
$tanggal = $_POST['tanggal'];
$abstrak = $_POST['abstrak'];



$query = "insert into buku values ('$isbn', '$judul', '$pengarang','$jumlah', '$tanggal', '$abstrak' )";

$InsertDisplay = "select * from buku where isbn = {$isbn}";


/**
 * @var $connection PDO
 */

//Persiapan Query
$statement = $connection->query($query);
$statement->setFetchMode(PDO::FETCH_ASSOC);
$statement2 = $connection->query($InsertDisplay);
$statement2->setFetchMode(PDO::FETCH_ASSOC);

//Jalankan Query
$results = $statement->fetchAll();
$resultsInsert = $statement2->fetchAll();

$output = [
    'insert' => $resultsInsert,
    'status' => 'Data Berhasil Ditambahkan'
];

//Output JSON
header('Content-Type: application/json');
echo json_encode($output);