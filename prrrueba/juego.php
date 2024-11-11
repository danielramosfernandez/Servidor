<?php
session_start();

// Iniciar el juego si no hay sesión activa o si el jugador elige "iniciar"
if (isset($_GET['iniciar']) || !isset($_SESSION['mazo'])) {
    iniciarJuego();
    header("Location: index.php");
    exit;
}

// Procesar la acción del jugador
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'];

    // Si el jugador decide robar una carta
    if ($accion === 'robar') {
        $_SESSION['jugador'][] = array_pop($_SESSION['mazo']);
    }
    // Si el jugador decide jugar una carta
    elseif (is_numeric($accion)) {
        $indice = (int)$accion;
        $cartaSeleccionada = $_SESSION['jugador'][$indice];

        if (esJugable($cartaSeleccionada, $_SESSION['cartaActual'])) {
            $_SESSION['cartaActual'] = $cartaSeleccionada;
            array_splice($_SESSION['jugador'], $indice, 1);

            // Verificar si el jugador ha ganado
            if (count($_SESSION['jugador']) === 0) {
                echo "¡Felicidades! Has ganado el juego.";
                session_destroy();
                exit;
            }

            // Turno de la computadora
            turnoComputadora();
        } else {
            echo "La carta seleccionada no es válida. Intenta otra vez.<br>";
        }
    }

    header("Location: index.php");
    exit;
}

// Función para iniciar el juego y crear el mazo, la mano de cada jugador y la carta inicial.
function iniciarJuego() {
    $_SESSION['mazo'] = crearMazo();
    $_SESSION['jugador'] = repartirCartas($_SESSION['mazo'], 5);
    $_SESSION['computadora'] = repartirCartas($_SESSION['mazo'], 5);
    $_SESSION['cartaActual'] = array_pop($_SESSION['mazo']);
}

// Crear el mazo básico con números y colores.
function crearMazo() {
    $colores = ['Rojo', 'Verde', 'Azul', 'Amarillo'];
    $mazo = [];

    foreach ($colores as $color) {
        for ($i = 0; $i <= 9; $i++) {
            $mazo[] = "$color $i";
        }
    }
    shuffle($mazo);
    return $mazo;
}

// Repartir cartas a cada jugador.
function repartirCartas(&$mazo, $cantidad) {
    $mano = [];
    for ($i = 0; $i < $cantidad; $i++) {
        $mano[] = array_pop($mazo);
    }
    return $mano;
}

// Verificar si la carta es jugable.
function esJugable($carta, $cartaActual) {
    [$colorCarta, $numeroCarta] = explode(' ', $carta);
    [$colorActual, $numeroActual] = explode(' ', $cartaActual);

    return $colorCarta === $colorActual || $numeroCarta === $numeroActual;
}

// Lógica para el turno de la computadora.
function turnoComputadora() {
    $jugado = false;

    foreach ($_SESSION['computadora'] as $i => $carta) {
        if (esJugable($carta, $_SESSION['cartaActual'])) {
            $_SESSION['cartaActual'] = $carta;
            array_splice($_SESSION['computadora'], $i, 1);
            $jugado = true;
            break;
        }
    }

    // Si la computadora no tiene carta jugable, roba una carta.
    if (!$jugado) {
        $_SESSION['computadora'][] = array_pop($_SESSION['mazo']);
    }

    // Verificar si la computadora ha ganado.
    if (count($_SESSION['computadora']) === 0) {
        echo "La computadora ha ganado el juego.<br>";
        session_destroy();
        exit;
    }
}
