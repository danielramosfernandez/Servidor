<?php
$email="abc@abc.com";
$emailErr="Email correcto";
if (empty($email)) {
 $emailErr = "Se requiere Email";
 } else {
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $emailErr = "Fomato de Email invalido";
 }
 }
echo $email;
echo "<br>";
echo $emailErr;
?>
<!-- La opción filter se utiliza para comprobar que el e-mail es correcto 
     en caso de que no lo fuera se cambia el texto guardado en emailErr que pasa de
     Email correcto a formato de Email invalido -->