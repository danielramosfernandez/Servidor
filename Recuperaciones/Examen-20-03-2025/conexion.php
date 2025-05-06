<!-- Añadir el 3307 en clase -->
<?php
$hn = 'localhost';
$db = 'bdnotas';
$un = 'root';
$pw = '';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
