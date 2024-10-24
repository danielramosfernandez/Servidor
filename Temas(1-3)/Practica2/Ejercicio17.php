<?php
$animales=array('Lagartija','Araña','Perro','Gato','Ratón'); 
$numeros= array('12','34','45','52','12'); 
$cosas= array('Sauce','Pino','Naranjo','Chopo','Perro','34' ); 

$resultado=array_merge($animales,$numeros,$cosas); 
print_r($resultado);
?> 