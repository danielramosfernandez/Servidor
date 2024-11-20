<?php
session_start(); // Inicia o reanuda la sesión para mantener el estado del juego

// Iniciar el juego si no hay una sesión activa o si el jugador elige "iniciar"
if (isset($_GET['iniciar']) || !isset($_SESSION['mazo'])) {
    iniciarJuego(); // Llama a la función que inicializa el juego
    header("Location: index.php"); // Redirige a index.php para comenzar el juego después de iniciar
    exit; // Detiene la ejecución para evitar que el código continúe ejecutándose en esta página
}

// Procesar la acción del jugador cuando envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion']; // Obtiene la acción del jugador desde el formulario enviado

    // Si el jugador decide robar una carta
    if ($accion === 'robar') {
        $_SESSION['jugador'][] = array_pop($_SESSION['mazo']); // Toma una carta del mazo y la agrega a la mano del jugador
    }
    // Si el jugador decide jugar una carta especificando su índice
    elseif (is_numeric($accion)) {
        $indice = (int)$accion; // Convierte el valor de 'accion' a entero para el índice
        $cartaSeleccionada = $_SESSION['jugador'][$indice]; // Obtiene la carta seleccionada en la mano del jugador

        // Verifica si la carta seleccionada es jugable
        if (esJugable($cartaSeleccionada, $_SESSION['cartaActual'])) {
            $_SESSION['cartaActual'] = $cartaSeleccionada; // Actualiza la carta en la pila
            array_splice($_SESSION['jugador'], $indice, 1); // Remueve la carta jugada de la mano del jugador

            // Verificar si el jugador ha ganado (se quedó sin cartas)
            if (count($_SESSION['jugador']) === 0) {
                echo "¡Felicidades! Has ganado el juego."; // Mensaje de victoria
                session_destroy(); // Termina la sesión y limpia los datos
                exit;
            }

            // Turno de la computadora para jugar su carta
            turnoComputadora();
        } else {
            echo "La carta seleccionada no es válida. Intenta otra vez.<br>"; // Mensaje de error si la carta no es válida
        }
    }

    header("Location: index.php"); // Redirige de nuevo a index.php para actualizar la pantalla
    exit;
}

// Función para iniciar el juego y configurar las variables de sesión
function iniciarJuego() {
    $_SESSION['mazo'] = crearMazo(); // Crea el mazo de cartas y lo guarda en la sesión
    $_SESSION['jugador'] = repartirCartas($_SESSION['mazo'], 5); // Reparte 5 cartas al jugador y guarda en la sesión
    $_SESSION['computadora'] = repartirCartas($_SESSION['mazo'], 5); // Reparte 5 cartas a la computadora
    $_SESSION['cartaActual'] = array_pop($_SESSION['mazo']); // Toma una carta inicial para la pila de juego
}

// Función para crear el mazo básico de UNO con números y colores
function crearMazo() {
    $colores = ['Rojo', 'Verde', 'Azul', 'Amarillo']; // Define los colores de las cartas
    $mazo = [];

    // Crea las cartas con números del 0 al 9 para cada color
    foreach ($colores as $color) {
        for ($i = 0; $i <= 9; $i++) {
            $mazo[] = "$color $i"; // Agrega cada carta al mazo
        }
    }
    shuffle($mazo); // Mezcla el mazo
    return $mazo; // Devuelve el mazo ya mezclado
}

// Función para repartir una cantidad de cartas específica de un mazo
function repartirCartas(&$mazo, $cantidad) {
    $mano = [];
    for ($i = 0; $i < $cantidad; $i++) {
        $mano[] = array_pop($mazo); // T
