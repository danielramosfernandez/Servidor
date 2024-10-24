<?php
$animales=array('Lagartija','Araña','Perro','Gato','Ratón'); 
$numeros= array('12','34','45','52','12'); 
$cosas= array('Sauce','Pino','Naranjo','Chopo','Perro','34' ); 

foreach($numeros as $numero){
    array_push($animales,$numeros); 
}
foreach($cosas as $cosa){ 
    array_push($animales,$cosa);
}
print_r($animales);
?> 