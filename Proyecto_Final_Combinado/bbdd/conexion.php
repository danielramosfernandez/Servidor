<?php
$servername = "fdb1028.awardspace.net";  // Host proporcionado por AwardSpace
$username = "4597025_diabetesdb";  // El nombre de usuario que has creado
$password = "admin";  // La contraseña que asignaste al usuario "admin"
$dbname = "4597025_diabetesdb";  // El nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
