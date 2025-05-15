<?php
$host = 'localhost';
$database = 'videoclubs';
$user = 'root'; // O el usuario correcto si no es 'root'
$pass = '';     // Y su contraseña

$connection = new mysqli($host, $user, $pass, $database);

if ($connection->connect_error) {
    die("Error de conexión: " . $connection->connect_error);
}
?>
