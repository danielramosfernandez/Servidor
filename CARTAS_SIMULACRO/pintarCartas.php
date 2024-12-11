<?php
session_start();

// Generar una combinación de cartas con tres parejas
function generarBaraja() {
    // Tres nombres de cartas base
    $cartasBase = ["copas_02", "copas_03", "copas_05"];
    
    // Duplicar cada carta base para formar parejas
    $baraja = array_merge($cartasBase, $cartasBase);
    
    // Mezclar las cartas aleatoriamente
    shuffle($baraja);

    return $baraja;
}

// Guardar la baraja en la sesión si no existe
if (!isset($_SESSION['baraja'])) {
    $_SESSION['baraja'] = generarBaraja();
}

// Función para pintar las cartas
function pintar($levanta) {
    $comb = $_SESSION['baraja'];
    for ($i = 0; $i < 6; $i++) {
        if ($i == $levanta - 1 && $levanta != -1) {
            // Mostrar la carta levantada
            $archivo = $comb[$i] . ".jpg";
            echo <<<HTML
                <img src='$archivo' width='260' height='400'>
            HTML;
        } else {
            // Mostrar la carta boca abajo
            echo <<<HTML
                <img src='boca_abajo.jpg' width='260' height='400'>
            HTML;
        }
    }
}

// Para pruebas: puedes llamar a la función pintar con un índice
// Por ejemplo, si quieres levantar la carta en la posición 2:
// pintar(2);

?>
