<?php 
session_start(); // Iniciar sesión

// Comprobación de autenticación y rol
if (!isset($_SESSION['rol'])){ 
    header("location:index.php"); // Si no está autenticado, redirigir a la página de inicio
    exit();
}

if ($_SESSION['rol'] !== 1){ 
    header("Location: index.php"); // Si el rol no es 1, redirigir a la página de inicio
    exit();
}

// Comprobamos si se ha enviado un nivel para actualizar la sesión
if (isset($_GET['nivel'])) {
    // Guardamos el nivel en la sesión
    $_SESSION['nivel'] = $_GET['nivel'];
    header("Location: jugar.php"); // Redirigimos a la página de juego
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Dificultad</title>
</head>
<body>
    <h1>Bienvenido al menú de dificultad</h1>
    <p>Selecciona el nivel de dificultad para el juego.</p>

    <!-- Formulario para seleccionar el nivel -->
    <form action="menu-dificultad.php" method="get">
        <label for="nivel">Selecciona un nivel:</label>
        <select name="nivel" id="nivel">
            <option value="3">Nivel 3 (3 círculos)</option>
            <option value="4">Nivel 4 (4 círculos)</option>
            <option value="5">Nivel 5 (5 círculos)</option>
        </select>
        <button type="submit">Establecer Nivel</button>
    </form>

    <br>
    <a href="logout.php">Cerrar sesión</a> <!-- Enlace para cerrar sesión -->
</body>
</html>
