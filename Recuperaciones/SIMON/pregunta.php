<?php
session_start();
require_once "pintar-circulos.php";

$nivel = $_SESSION['nivel'] ?? 4;

for ($i = 1; $i <= $nivel; $i++) {
    $key = "res$i";
    $_SESSION[$key] = $_SESSION[$key] ?? "black";
}

if (isset($_POST["tempColor"])) {
    $tempColor = $_POST["tempColor"];

    for ($i = 1; $i <= $nivel; $i++) {
        $key = "res$i";
        if ($_SESSION[$key] === "black") {
            $_SESSION[$key] = $tempColor;
            break;
        }
    }

    $completado = true;
    for ($i = 1; $i <= $nivel; $i++) {
        if ($_SESSION["res$i"] === "black") {
            $completado = false;
            break;
        }
    }

    if ($completado) {
        $respuesta = [];
        for ($i = 1; $i <= $nivel; $i++) {
            $respuesta[] = $_SESSION["res$i"];
        }
        $_SESSION["respuesta"] = $respuesta;

        echo '<meta http-equiv="refresh" content="0;url=comprobar.php">';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMÓN</title>
    <style>
        .circulos {
            display: flex;
        }
        .circulo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 10px;
        }
    </style>
</head>
<body>
    <h1>SIMÓN</h1>
    <h2><?php echo $_SESSION['usu']; ?>, pulsa los colores para pintar estos círculos</h2>

    <div class="circulos">
        <?php 
        $colores = [];
        for ($i = 1; $i <= $nivel; $i++) {
            $colores[] = $_SESSION["res$i"];
        }
        pintar_circulos(...$colores);
        ?>
    </div>

    <form action="#" method="post">
        <input type="submit" value="red" name="tempColor" style="background-color: red; color: white;">
        <input type="submit" value="green" name="tempColor" style="background-color: green; color: white;">
        <input type="submit" value="blue" name="tempColor" style="background-color: blue; color: white;">
        <input type="submit" value="yellow" name="tempColor" style="background-color: yellow; color: black;">
    </form>
</body>
</html>
