<?php // login.php
 $hn = 'localhost';
 $db = 'agenda';
 $un = 'root';
 $pw = ''; 
 
 $conn = new mysqli($hn,$un,$pw,$db,3307); 

 // Verificar la conexión
 if ($conn->connect_error) {
     die("Conexión fallida: " . $conn->connect_error);
 }
?> 
