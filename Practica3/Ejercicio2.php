<!-- Almacena la función anterior en el fichero matemáticas.php. Crea un fichero que
la incluya y la utilice.
 --> 
<?php
include 'Matematicas.php';
$resultado = ecuacion_segundo_grado(9, -7, -6);

if ($resultado === false) {
    echo "No hay soluciones reales.";
} elseif (is_array($resultado)) {
    if (count($resultado) == 1) {
        echo "Solución: " . $resultado[0];
    } else {
        echo "Soluciones: " . $resultado[0] . " y " . $resultado[1];
    }
} else {
    echo $resultado;
}
?>
