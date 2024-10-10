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
