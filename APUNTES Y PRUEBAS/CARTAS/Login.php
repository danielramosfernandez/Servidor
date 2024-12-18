<?php // login.php
 $hn = 'localhost';
 $db = 'cartas';
 $un = 'root';
 $pw = ''; 
 // Crear conexión
 $conn = new mysqli($hn,$un,$pw,$db,3307); 

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?> 