<?php
    // Inicia una sesión para poder almacenar datos entre distintas páginas
    session_start();

    // Si el formulario envía un color (variable "color" mediante método POST)
    if (isset($_POST["color"])) {
        // Guarda el color enviado en la sesión con la clave "color"
        $_SESSION["color"] = $_POST["color"];
    }

    // Verifica si se envió un color temporal ("tempColor") mediante POST
    if (isset($_POST["tempColor"])) {
        // Si existe "tempColor", lo asigna a la variable $tempColor
        $tempColor = $_POST["tempColor"];
    } else {
        // Si no se envió ningún color, asigna "black" como color por defecto
        $tempColor = "black";
    }
    
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- Configura el juego de caracteres a UTF-8, para soportar caracteres especiales -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Define una clase CSS para el círculo */
        .circulo {
            width: 100px;            /* Ancho de 100px para el círculo */
            height: 100px;           /* Altura de 100px para el círculo */
            background-color: <?php echo $tempColor;?>; /* Asigna el color de fondo de $tempColor */
            border-radius: 50%;      /* Aplica un borde redondeado del 50% para que sea un círculo */
        }
    </style>
</head>
<body>
    <!-- Muestra un div con la clase "circulo" que usa el color almacenado en $tempColor -->
    <div class="circulo"></div>

    <!-- Primer formulario: selecciona un color temporal -->
    <form action="#" method="post">
        <!-- Botones que envían el valor de color como "tempColor" mediante POST al presionarse -->
        <input type="submit" value="red" name="tempColor">
        <input type="submit" value="green" name="tempColor">
        <input type="submit" value="blue" name="tempColor">
        <input type="submit" value="yellow" name="tempColor">
    </form>

    <!-- Segundo formulario: envía el color temporal seleccionado para ser procesado en otra página -->
    <form action="comprobar.php" method="post">
        <!-- Campo oculto que almacena el valor del color seleccionado -->
        <input type="hidden" name="resColor" value="<?php echo $tempColor;?>">
        <!-- Botón para enviar el formulario a comprobar.php -->
        <input type="submit" value="Enviar" name="submit">
    </form>
    
</body>
</html>
