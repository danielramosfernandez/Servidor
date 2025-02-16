<?php 
session_start(); 
$nome = $_SESSION['nombre'] ?? 'Invitado';
echo "<h2>Bienvenido: $nome</h2>"; 

// Array de cartas con nombres de archivos de imágenes
$cartas = ["carta1.jpg", "carta2.jpg", "carta3.jpg", "carta1.jpg", "carta2.jpg", "carta3.jpg"]; 
shuffle($cartas);  

// Guardar las cartas en la sesión (esto se hace una sola vez)
if (!isset($_SESSION['combinacion'])) {
    $_SESSION['combinacion'] = $cartas;
}

// Inicializamos la sesión de las cartas levantadas si no existe
if (!isset($_SESSION['mostradas'])) {
    $_SESSION['mostradas'] = array_fill(0, 6, false); // false significa que la carta está oculta
}

// Manejo del levantamiento de cartas
if (isset($_POST['levantar'])) {
    $pos = $_POST['levantar'];
    $_SESSION['mostradas'][$pos] = true; // Marca la carta como levantada
}

// Mostrar las cartas
echo "<form method='POST' action='Respuesta.php'>";
for ($i = 0; $i < 6; $i++) {
    $cartaLevantada = $_SESSION['mostradas'][$i]; // Verifica si la carta está levantada
    $cartaImagen = $cartas[$i]; // Valor de la carta (nombre del archivo de imagen)

    if ($cartaLevantada) {
        // Mostrar la carta levantada
        echo "<button type='submit' name='levantar' value='$i' style='border:none; background:none;'>
                <img src='img/$cartaImagen' alt='Carta' width='100' height='150'>
              </button>";
    } else {
        // Mostrar una carta oculta
        echo "<button type='submit' name='levantar' value='$i' style='border:none; background:none;'>
                <img src='img/blanca.jpg' alt='Carta Oculta' width='100' height='150'>
              </button>";
    }
}
echo "</form>";

// Contar las cartas levantadas
$cartasLevantadas = $_SESSION['cartas_levantadas'] ?? 0;
echo "<p>Cartas levantadas: $cartasLevantadas</p>";

// Formulario para seleccionar las parejas
echo "
    <form method='POST' action='Respuesta.php'>
        <label>Pareja 1: <input type='number' name='pareja1' min='1' max='6' required></label>
        <label>Pareja 2: <input type='number' name='pareja2' min='1' max='6' required></label>
        <button type='submit'>Comprobar</button>
    </form>
";
?>
