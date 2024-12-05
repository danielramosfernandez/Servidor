<?php
session_start();

// Verifica si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Asegúrate de que pareja1 y pareja2 están definidas
    if (isset($_POST['pareja1']) && isset($_POST['pareja2'])) {
        $pareja1 = $_POST['pareja1'] - 1;
        $pareja2 = $_POST['pareja2'] - 1;

        // Lógica de juego existente para manejar estas variables
        echo "Pareja 1: $pareja1, Pareja 2: $pareja2";
    } else {
        echo "Por favor, selecciona ambas parejas.";
    }
} else {
    echo "Esperando el envío del formulario...";
}

// Recuperamos las combinaciones de cartas y los datos del formulario
$combi = $_SESSION['combinacion'] ?? []; 
$pare1 = isset($_POST['pareja1']) ? $_POST['pareja1'] - 1 : -1; 
$pare2 = isset($_POST['pareja2']) ? $_POST['pareja2'] - 1 : -1; 
$intentos = $_SESSION['cartas_levantadas'] ?? 0;

// Verificación de las posiciones seleccionadas
if ($pare1 >= 0 && $pare2 >= 0 && $pare1 < 6 && $pare2 < 6 && $pare1 != $pare2) { 
    if ($combi[$pare1] === $combi[$pare2]) {
        echo "<h2>¡Acertaste! Después de $intentos intentos.</h2>"; 
        $_SESSION['puntos'] = ($_SESSION['puntos'] ?? 0) + 1;
    } else { 
        echo "<h2>¡Fallaste! Errores en las posiciones " . ($pare1 + 1) . " y " . ($pare2 + 1) . ". Llevas $intentos intentos.</h2>";
    }
} else { 
    echo "<h2>Introduce posiciones correctas por favor.</h2>"; 
}

// Crear conexión con la base de datos
$hn = 'localhost';  // Hostname
$un = 'root';       // Usuario
$pw = '';           // Contraseña
$db = 'cartas';     // Base de datos
$conn = new mysqli($hn, $un, $pw, $db, 3307); // Conexión al puerto 3307

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el nombre de usuario desde la sesión
$usuario = $_SESSION['nombre'] ?? ''; 
$puntos = $_SESSION['puntos'] ?? 0;
$intentos = $_SESSION['cartas_levantadas'] ?? 0; 

if ($usuario) {
    // Actualizar los puntos en la base de datos
    $sql = "UPDATE jugador SET puntos = $puntos, extra = $intentos WHERE nombre = '$usuario'";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Puntos actualizados correctamente.</p>";
    } else {
        echo "<p>Error al actualizar los puntos: " . $conn->error . "</p>";
    }
}

// Mostrar la tabla de jugadores actualizada
$resultado = $conn->query("SELECT nombre, puntos, extra FROM jugador");
if ($resultado->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Nombre</th>
                <th>Puntos</th>
                <th>Intentos</th>
            </tr>";
    while ($fila = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>{$fila['nombre']}</td>
                <td>{$fila['puntos']}</td>
                <td>{$fila['extra']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No hay jugadores registrados.</p>";
}

// Cerrar la conexión
$conn->close();

// Enlace para volver al juego
echo "<a href='mostrarcartas.php'>Volver al juego</a>";

// Fin del script
?>
