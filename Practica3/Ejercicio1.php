<!-- Crea una función para resolver la ecuación de segundo grado. Esta función recibe
los coeficientes de la ecuación y devuelve un array con las soluciones. Si no hay
soluciones reales, devuelve FALSE. -->
 <?php
function ecuacion_segundo_grado($a, $b, $c) {
    if ($a == 0) {
        if ($b != 0) {
            return [-$c / $b]; // Ecuación lineal
        } elseif ($c == 0) {
            return "Cualquier número es solución"; // Ecuación trivial
        } else {
            return false; // No hay solución
        }
    }

    $discriminante = $b ** 2 - 4 * $a * $c;
    
    if ($discriminante < 0) {
        return false; // No hay soluciones reales
    }

    $solucion1 = (-$b + sqrt($discriminante)) / (2 * $a);
    
    if ($discriminante == 0) {
        return [$solucion1]; // Una solución real
    }

    $solucion2 = (-$b - sqrt($discriminante)) / (2 * $a);
    return [$solucion1, $solucion2]; // Dos soluciones reales
}

// Ejemplo de uso
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



