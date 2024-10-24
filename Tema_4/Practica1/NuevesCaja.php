<?php
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Esta parte comprueba si el formulario fue enviado
    $suma = 0; /* La suma debe estar inicializada */
    $valores = []; /* Los números deben quedar guardados en el array */

    /* Con este for rellenamos el array */
    for ($i = 1; $i <= 9; $i++) {
        if (isset($_POST['num' . $i])) {
            $valores[] = (float)$_POST['num' . $i]; /* Con esta parte del código transformamos los valores float
            a números enteros */
        }
    }

    /* Con este foreach realizamos la suma */
    foreach ($valores as $valor) {
        $suma += $valor;
    }

    /* En esta parte se muestra el resultado de la suma */
    $mensaje = "La suma de los números es: $suma";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Suma de Números</title>
</head>
<body>
    <h2>Introduzca los números para sumar:</h2>

    <form method="post" action="#">
    <?php
    /* Con este for se autogenera 9 inputs donde introducir los números */
    for ($i = 1; $i <= 9; $i++) {
        echo '<label>' . ($i - 1) . '
        
            <input type="number" name="num' . $i . '" value="' . ($_POST['num' . $i] ?? '') . '" step="any" required>
        </label>';
        echo '<br>';/* Esta siguiente línea es el input donde se introducen los datos */
    }
    ?>
        <br>

        <!-- Botón para enviar los datos -->
        <button type="submit">Sumar</button>
    </form>

    <?php
    /* Este condicional mostrará el $mensaje en caso de q haya alguno guardado en
       el array */
    if (!empty($mensaje)) {
        echo "<h2> $mensaje</h2>";
    }
    ?>
</body>
</html>