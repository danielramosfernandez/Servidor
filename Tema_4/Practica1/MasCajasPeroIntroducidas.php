<?php

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    if (isset($_POST['elementos'])) {
        $elementos = (int)$_POST['elementos'];


        $suma = 0;
        $valores = [];

  
        for ($i = 1; $i <= $elementos; $i++) {
            if (isset($_POST['num' . $i])) {
                $valores[] = (float)$_POST['num' . $i]; 
            }
        }

   
        foreach ($valores as $valor) {
            $suma += $valor;
        }

        // Mostrar el resultado
        $mensaje = "La suma de los números es: $suma";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Suma de Números</title>
</head>
<body>

<h2>Introduce la cantidad de elementos que quieres sumar</h2>
<form method="post" action="#">
    Introduce la cantidad de elementos que quieres sumar:
    <input type="text" name="elementos" required><br><br>
    <input type="submit" value="Enviar">
</form>

<?php

if (isset($elementos) && $elementos > 0) {
    echo '<h2>Introduzca los números para sumar:</h2>';
    echo '<form method="post" action="#">';

    for ($i = 1; $i <= $elementos; $i++) {
        echo '<label>' . $i . ': 
            <input type="number" name="num' . $i . '" value="' . ($_POST['num' . $i] ?? '') . '" step="any" required>
        </label><br>';
    }

    echo '<input type="hidden" name="elementos" value="' . $elementos . '">'; 
    echo '<input type="submit" value="Calcular Suma">';
    echo '</form>';
}

if (!empty($mensaje)) {
    echo "<h2>$mensaje</h2>";
}
?>

</body>
</html>
