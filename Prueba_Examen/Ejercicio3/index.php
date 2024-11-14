<?php
session_start();

// Inicializar variables en la sesión si no existen
if (!isset($_SESSION["num"])) {
    $_SESSION["num"] = rand(1, 100); 
    $_SESSION["intentos"] = 0;       
}

$mensaje = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['numeros'])) { // Verificar que se envió el número
        $elemento = (int)$_POST['numeros']; // Convertir a entero

      
        if ($elemento > $_SESSION["num"]) { 
            $mensaje = "El número es MENOR.";
            $_SESSION["intentos"]++;
        } elseif ($elemento < $_SESSION["num"]) { 
            $mensaje = "El número es MAYOR.";
            $_SESSION["intentos"]++;
        } else {
            $mensaje = "¡Has acertado! Has necesitado " . ($_SESSION["intentos"] + 1) . " intentos.";

            unset($_SESSION["num"]);
            unset($_SESSION["intentos"]);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Adivina el Número</title>
</head>
<body>


<p><?= $mensaje ?></p>

<form method="post" action="#">
    Adivina mi número: <input type="number" name="numeros" required><br><br>
    <input type="submit" value="Enviar">
</form>

