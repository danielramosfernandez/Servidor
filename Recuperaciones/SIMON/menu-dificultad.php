<?php 
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== 1) { 
    header("Location: index.php");
    exit();
}

if (isset($_GET['nivel'])) {
    $_SESSION['nivel'] = $_GET['nivel'];
    header("Location: jugar.php");
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

    <form action="menu-dificultad.php" method="get">
        <label for="nivel">Selecciona un nivel:</label>
        <select name="nivel" id="nivel">
            <option value="3">Nivel 3 (3 círculos)</option>
            <option value="4">Nivel 4 (4 círculos)</option>
            <option value="5">Nivel 5 (5 círculos)</option>
        </select>
        <button type="submit">Establecer Nivel</button>
    </form>
</body>
</html>
