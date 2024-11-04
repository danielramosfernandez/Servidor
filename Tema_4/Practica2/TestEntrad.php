<?php
function test_entrada($valor=" vacas ") {   
    $valor = trim($valor);   
    $valor = stripslashes($valor);   
    return $valor; 
} 
   echo test_entrada();
?> 

<!-- Esta funcion elimina tanto los espacios como las comillas -->