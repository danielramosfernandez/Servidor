<?php
$servername = "fdb1028.awardspace.net";  
$username = "4597025_diabetesdb";  
$password = "1_diabetesdB";  
$dbname = "4597025_diabetesdb"; 

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
