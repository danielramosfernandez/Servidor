<?php
session_start();  // Inicia la sesión

// Verificar si el usuario está logueado, si no, redirigir al login
if (!isset($_SESSION['usuario'])) {
    header('Location: acceso.php');  // Redirigir si no está logueado
    exit();  // Asegúrate de que el script se detenga aquí después de la redirección
}

require_once "pintar-circulos.php";  // Asegúrate de que este archivo esté correctamente incluido

function color() {
    $nColor = rand(0, 3);

    switch ($nColor) {
        case 0: return "red";
        case 1: return "yellow";
        case 2: return "blue";
        case 3: return "green";
    }
}

// Generar colores aleatorios y guardarlos en la sesión
$_SESSION["solucion"] = pintar_circulos(color(), color(), color(), color());
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Simon</title>
    <style>
        .circulos {
            display: flex;
        }
        .circulo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h2>
    <div class="circulos">
        <?php
        // Llamada a la función pintar_circulos() para pintar los círculos con los colores aleatorios
        pintar_circulos($_SESSION["solucion"][0], $_SESSION["solucion"][1], $_SESSION["solucion"][2], $_SESSION["solucion"][3]);
        ?>
    </div>
    <br>
    <form action="preguntar.php" method="post">
        <input type="submit" value="Jugar">
    </form>
</body>
</html>
