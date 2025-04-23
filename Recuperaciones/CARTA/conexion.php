<!-- En clase Dani, acuerdate de poner el 3307 -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cartas";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
<!-- Reutilizado de otros ejercicios -->