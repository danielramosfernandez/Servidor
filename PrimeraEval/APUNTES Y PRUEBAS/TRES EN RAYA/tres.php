<?php
session_start(); // Inicia la sesión para almacenar los datos del juego entre solicitudes

// Inicializar el tablero si no existe
if (!isset($_SESSION['board'])) {
    $_SESSION['board'] = array_fill(0, 9, null); // Crea un array con 9 posiciones en null (tablero vacío)
    $_SESSION['turn'] = 'X'; // X comienza el juego
    $_SESSION['winner'] = null; // Inicialmente, no hay ganador
}

// Reiniciar el juego si se pulsa el botón de reset
if (isset($_POST['reset'])) {
    $_SESSION['board'] = array_fill(0, 9, null); // Reinicia el tablero
    $_SESSION['turn'] = 'X'; // X vuelve a comenzar
    $_SESSION['winner'] = null; // Reinicia el estado del ganador
}

// Manejar un movimiento cuando se hace clic en una celda
if (isset($_POST['move']) && $_SESSION['winner'] === null) { // Solo si no hay un ganador
    $position = $_POST['move']; // Captura la posición seleccionada

    if ($_SESSION['board'][$position] === null) { // Verifica si la posición está vacía
        $_SESSION['board'][$position] = $_SESSION['turn']; // Coloca la marca (X o O) en esa posición
        
        // Define las combinaciones ganadoras posibles
        $winningCombinations = [
            [0, 1, 2], [3, 4, 5], [6, 7, 8], // Filas
            [0, 3, 6], [1, 4, 7], [2, 5, 8], // Columnas
            [0, 4, 8], [2, 4, 6]             // Diagonales
        ];

        // Revisa cada combinación ganadora
        foreach ($winningCombinations as $combo) {
            // Si hay tres marcas iguales en una combinación, hay un ganador
            if ($_SESSION['board'][$combo[0]] === $_SESSION['turn'] &&
                $_SESSION['board'][$combo[1]] === $_SESSION['turn'] &&
                $_SESSION['board'][$combo[2]] === $_SESSION['turn']) {
                $_SESSION['winner'] = $_SESSION['turn']; // Declara el ganador
                break; // Sale del ciclo si ya se encontró un ganador
            }
        }

        // Cambia el turno si aún no hay ganador
        if ($_SESSION['winner'] === null) {
            $_SESSION['turn'] = $_SESSION['turn'] === 'X' ? 'O' : 'X'; // Alterna el turno entre X y O
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tres en Raya</title>
    <style>
        /* Estilos para el tablero */
        .board {
            display: grid;
            grid-template-columns: repeat(3, 100px); /* 3 columnas de 100px */
            grid-template-rows: repeat(3, 100px); /* 3 filas de 100px */
            gap: 5px; /* Espacio entre celdas */
        }
        .cell {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2em;
            width: 100px;
            height: 100px;
            border: 1px solid #333; /* Bordes de las celdas */
            cursor: pointer; /* Cambia el cursor cuando el usuario pasa sobre una celda */
        }
        .cell.disabled {
            cursor: not-allowed; /* Cambia el cursor si la celda ya está ocupada */
        }
        .message {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h1>Tres en Raya</h1>

<div class="board">
    <?php for ($i = 0; $i < 9; $i++): ?> <!-- Itera sobre las 9 celdas del tablero -->
        <form method="post" style="display: inline;"> <!-- Cada celda es un formulario individual -->
            <button class="cell <?= $_SESSION['board'][$i] ? 'disabled' : '' ?>" 
                    type="submit" 
                    name="move" 
                    value="<?= $i ?>" 
                    <?= $_SESSION['board'][$i] || $_SESSION['winner'] ? 'disabled' : '' ?>> <!-- Desactiva si ya hay un ganador o si está ocupada -->
                <?= $_SESSION['board'][$i] ?> <!-- Muestra X, O, o vacío en la celda -->
            </button>
        </form>
    <?php endfor; ?>
</div>

<div class="message">
    <?php if ($_SESSION['winner']): ?> <!-- Mensaje si hay un ganador -->
        <h2>¡<?= $_SESSION['winner'] ?> ha ganado!</h2>
    <?php elseif (!in_array(null, $_SESSION['board'])): ?> <!-- Mensaje si hay empate -->
        <h2>¡Empate!</h2>
    <?php else: ?> <!-- Indica el turno actual si el juego sigue en progreso -->
        <h2>Turno de <?= $_SESSION['turn'] ?></h2>
    <?php endif; ?>
</div>

<form method="post">
    <button type="submit" name="reset">Reiniciar Juego</button> <!-- Botón para reiniciar el juego -->
</form>

</body>
</html>
