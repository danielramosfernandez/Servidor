<?php 
require "C:/xampp/htdocs/vendor/autoload.php";
$ctmongodb = new MongoDB\Client("mongodb://localhost:27017"); 
$db=$ctmongodb->Mi_BD; 
$collection=$db->mi_coleccion; 
$document=array("Nombre"=>"Daniel Ramos", "Modulo"=>"Desarrollo Entorno Servidor"); 
$collection->insertOne($document); 
$result=$collection->find(["Nombre"=>"Daniel Ramos", "Modulo"=>"Desarrollo Entorno Servidor"]); 

foreach($result as $dat){ 
    echo "Nombre:{$dat["Nombre"]}<br>Modulo:{$dat["Modulo"]}";
} 
session_destroy();
?>