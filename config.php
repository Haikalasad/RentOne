<?php
require 'vendor/autoload.php'; 

$client = new MongoDB\Client("mongodb://localhost:27017");

$database = $client->selectDatabase('user');
// echo "Koneksi MongoDB berhasil: ";
// var_dump($client);

// $collections = $database->listCollections();
// echo "Koleksi dalam database: ";
// var_dump(iterator_to_array($collections));


?>
