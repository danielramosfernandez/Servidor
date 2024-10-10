<?php
require_once 'personas.php'; 
//Creamos el objeto.
$persona = new Persona();
//Seteamos las propiedades.
$persona->nombre = 'Daniel';
$persona->apellido = 'Ramos';
$persona->edad = 20;
//Mostramos el resultado de las propiedades.
echo 'Nombre: ' . $persona->nombre . '<br />';
echo 'Apellido: ' . $persona->apellido . '<br />';
echo 'Edad: ' . $persona->edad . '<br />';
echo $persona->saludar();
?>