<!--Escribe una función que reciba una cadena y comprueba si es un palíndromo. -->
<?php
//El array frase se corresponde a una cadena 
function comp($frase){ 
    $frase=preg_replace('/\s+/', '', $frase); 
    $frase=strtolower($frase); 
/* La función preg_replace elimina los espacios 
   La funcion strtolower pone todo en minúsculas
*/
    $frase_reves=strrev($frase); 
/* La funccion  strrev da la vuelta a la cadena 
    almacenada en frase, la $frase queda a su vez 
    guardada en $frase_reves */
    return $frase===$frase_reves; 
/* En este return establecemos que para ser palindromo 
    $frase debe ser identico (eso siginifica ===) a 
    $frase_reves */

}
$texto="Yo hago yoga hoy"; 
if(comp($texto)){ 
echo "Este texto es palíndromo";
}else{ 
echo "Este texto no es palíndromo";
}
?>