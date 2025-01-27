<?php
require '../../vendor/autoload.php';  

use MongoDB\Client; 

$mongoClient = new MongoDB\Client("mongodb://localhost:27017");  
$collection = $mongoClient -> AyuGijon -> eventos; 

$jsonFile = "eventos.json"; 
$jsonData = file_get_contents($jsonFile); 

$dataArray = json_decode($jsonData, true); 

$result = $collection->insertMany($dataArray); 

echo "Insertados" . $result-> getInsertedCount(). "documentos .\n"
?>