
<?php
//Importamos la clase Persona.
require_once 'persona3.php';
//Creamos el objeto con los valores que se definen en el constructor.
$persona = new Persona('Fernando', 'Gaitan', 26);
//Mostramos por pantalla los valores.
echo $persona->saludar();
//Destruimos el objeto.
unset($persona);  

?>