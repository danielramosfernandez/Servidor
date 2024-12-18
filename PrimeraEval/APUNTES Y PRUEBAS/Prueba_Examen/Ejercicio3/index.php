<?php
session_start();//Empieza la sesión 


if (!isset($_SESSION["num"])) {//Comprueba si el número está introducido
    $_SESSION["num"] = rand(1, 100); //Guardamos en variables de sesión el número Random
    $_SESSION["intentos"] = 0;//Guardamos en una variable de sesión el número de intentos       
}

$mensaje = '';//Aqui guardamos el mensaje


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['numeros'])) {//Si el numero está introducido
        $elemento = (int)$_POST['numeros']; //Guardamos el numero que entra en elemento
      
        if ($elemento > $_SESSION["num"]) { //si nuestro número es menor que el random
            $mensaje = "El número es MENOR.";//muestra este mensaje
            $_SESSION["intentos"]++;//Se acumula intentos al haber fallado

        } elseif ($elemento < $_SESSION["num"]) {//Si el número que introducimos es mayor
            $mensaje = "El número es MAYOR.";//El mensaje correspondiente
            $_SESSION["intentos"]++;//Se suma otro intento

        } else {
            $mensaje = "¡Has acertado! Has necesitado " . ($_SESSION["intentos"] + 1) . " intentos.";//Mensaje de victoria
            unset($_SESSION["num"]);//Se reinicia los numeros
            unset($_SESSION["intentos"]);//Se reinician los intentos
        }
    }
}
?>

<!DOCTYPE html><!-- Creamos el html -->
<html lang="es">

        <head>
            <meta charset="UTF-8">
            <title>Adivina el Número</title><!-- Titulo -->
        </head>
<body>


<p><?= $mensaje ?></p><!-- Se reproduce el mensaje -->
<form method="post" action="#"><!-- Llamamos en post, es un formulario -->

    Adivina mi número: <input type="number" name="numeros" required><br><br><!-- Boton -->
    <input type="submit" value="Enviar"><!-- Boton -->

</form><!-- Cerramos el form -->

