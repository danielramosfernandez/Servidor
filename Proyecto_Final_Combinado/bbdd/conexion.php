<?php
$host = "localhost"; 
$usuario = "root"; 
$password = ""; 
$dbname = "diabetesdb"; 

$conn = new mysqli($host, $usuario, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
