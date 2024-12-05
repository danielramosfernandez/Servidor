<?php
// Inicia la sesión para mantener al usuario
session_start();

// Mensaje de bienvenida al usuario
$nombre_usuario = $_SESSION['usuario'] ?? 'Invitado';
echo "<h1>¡Bienvenido, $nombre_usuario!</h1>";

// Generación de cartas aleatorias
$cartas = ['A', 'B', 'C', 'A', 'B', 'C'];
shuffle($cartas);

// Guarda la combinación inicial en la sesión
if (!isset($_SESSION['combinacion'])) {
    $_SESSION['combinacion'] = $cartas;
}

// Muestra el estado actual del juego
echo "<form method='POST' action='mostrarcartas.php'>";
for ($i = 0; $i < 6; $i++) {
    $carta = $_SESSION['mostradas'][$i] ?? false;
    if ($carta) {
        echo "<button type='submit' name='levantar' value='$i'>{$cartas[$i]}</button>";
    } else {
        echo "<button type='submit' name='levantar' value='$i'>🂠</button>";
    }
}
echo "</form>";

// Manejo de levantamiento de cartas
if (isset($_POST['levantar'])) {
    $pos = $_POST['levantar'];
    $_SESSION['mostradas'][$pos] = true;
    $_SESSION['cartas_levantadas'] = ($_SESSION['cartas_levantadas'] ?? 0) + 1;
}

// Mostrar cartas levantadas
$cartasLevantadas = $_SESSION['cartas_levantadas'] ?? 0;
echo "<p>Cartas levantadas: $cartasLevantadas</p>";

// Cajas de pareja y botón comprobar
echo "
    <form method='POST' action='resultado.php'>
        <label>Pareja 1: <input type='number' name='pareja1' min='1' max='6' required></label>
        <label>Pareja 2: <input type='number' name='pareja2' min='1' max='6' required></label>
        <button type='submit'>Comprobar</button>
    </form>
";
?>
