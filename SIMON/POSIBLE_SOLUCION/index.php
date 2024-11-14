<?php 
 // Genera un número aleatorio entre 0 y 3, asignándolo a la variable $nColor
 $nColor = rand(0,3);

 // Evalúa el valor de $nColor para determinar un color específico
 switch ($nColor) {
    case 0:
        // Si $nColor es 0, se asigna el color "red" a la variable $color
        $color = "red";
    break;
    case 1:
        // Si $nColor es 1, se asigna el color "yellow" a la variable $color
        $color = "yellow";
    break;
    case 2:
        // Si $nColor es 2, se asigna el color "blue" a la variable $color
        $color = "blue";
    break;
    case 3:
        // Si $nColor es 3, se asigna el color "green" a la variable $color
        $color = "green";
    break;
 }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <!-- Configura el juego de caracteres a UTF-8, para compatibilidad con caracteres especiales -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Define el título de la página -->
    <title>Document</title>
    <style>
        /* Define una clase "circulo" con estilos de CSS */
        .circulo {
            width: 100px;             /* Ancho de 100px para el círculo */
            height: 100px;            /* Altura de 100px para el círculo */
            background-color: <?php echo $color;?>; /* Asigna el color de fondo definido en PHP */
            border-radius: 50%;       /* Redondea el borde al 50% para formar un círculo */
        }
    </style>
</head>
<body>
    <!-- Div con la clase "circulo" que tendrá el color de fondo elegido aleatoriamente -->
    <div class="circulo"></div>
    <br>
    <!-- Formulario que envía el color del círculo a otra página, pregunta.php -->
    <form action="pregunta.php" method="post">
        <!-- Campo oculto que almacena el valor del color seleccionado -->
        <input type="hidden" name="color" value="<?php echo $color;?>">
        <!-- Botón de enviar para enviar el formulario -->
        <input type="submit" value="Jugar" name="submit">
    </form>
    
</body>
</html>
