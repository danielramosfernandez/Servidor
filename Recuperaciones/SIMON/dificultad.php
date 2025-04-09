<?php
session_start();

// Comprobamos que el nivel se haya seleccionado
if (isset($_GET['nivel'])) {
    // Guardamos el nivel en la sesión
    $_SESSION['nivel'] = $_GET['nivel'];
    header("Location: jugar.php"); // Redirigimos a la página de juego
    exit();
} else {
    // Si no se ha seleccionado un nivel, redirigimos al menú de dificultad
    header("Location: menu-dificultad.php");
    exit();
}
