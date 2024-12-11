<?php
session_start(); // Inicia la sesión

// Si el usuario no está logueado, lo redirigimos a acceso.php
if (!isset($_SESSION['usuario'])) {
    header('Location: acceso.php');
    exit;
}

require_once "pintar-circulos.php";

// Comprobamos si la respuesta es correcta
if ($_SESSION["solucion"] == $_SESSION["respuesta"]) {
    echo "<h2>¡Correcto!</h2>";
} else {
    echo "<h2>¡Incorrecto!</h2>";
}

echo "<h3>Combinación correcta: </h3>";
pintar_circulos($_SESSION["solucion"][0], $_SESSION["solucion"][1], $_SESSION["solucion"][2], $_SESSION["solucion"][3]);
echo "<h3>Tu respuesta: </h3>";
pintar_circulos($_SESSION["respuesta"][0], $_SESSION["respuesta"][1], $_SESSION["respuesta"][2], $_SESSION["respuesta"][3]);
?>

<form action="index.php">
    <input type="submit" value="Volver al juego">
</form>
