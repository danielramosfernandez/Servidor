<?php
// Inicia la sesión para acceder a los datos del juego
session_start();

// Recupera la combinación y las posiciones enviadas por el usuario
$combinacion = $_SESSION['combinacion'];
$pareja1 = $_POST['pareja1'] - 1;
$pareja2 = $_POST['pareja2'] - 1;
$intentos = $_SESSION['cartas_levantadas'] ?? 0;

// Validación de las posiciones
if ($pareja1 >= 0 && $pareja2 >= 0 && $pareja1 < 6 && $pareja2 < 6 && $pareja1 != $pareja2) {
    if ($combinacion[$pareja1] === $combinacion[$pareja2]) {
        echo "<h2>¡Acierto! Posiciones " . ($pareja1 + 1) . " y " . ($pareja2 + 1) . " después de $intentos intentos.</h2>";
        $_SESSION['puntos'] = ($_SESSION['puntos'] ?? 0) + 1;
    } else {
        echo "<h2>Fallo posiciones " . ($pareja1 + 1) . " y " . ($pareja2 + 1) . " después de $intentos intentos.</h2>";
        $_SESSION['puntos'] = ($_SESSION['puntos'] ?? 0) - 1;
    }
} else {
    echo "<h2>Por favor selecciona dos posiciones válidas.</h2>";
}

// Actualización de la base de datos
$conexion = new mysqli("localhost", "root", "", "CARTAS");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$usuario = $_SESSION['usuario'] ?? 'desconocido';
$puntos = $_SESSION['puntos'];
$sql = "UPDATE jugadores SET puntos = $puntos, extra = $intentos WHERE nombre = '$usuario'";
if ($conexion->query($sql) === TRUE) {
    echo "<p>Puntos actualizados correctamente.</p>";
} else {
    echo "<p>Error al actualizar los puntos: " . $conexion->error . "</p>";
}

// Mostrar la tabla actualizada
$resultado = $conexion->query("SELECT nombre, puntos, extra FROM jugadores");
if ($resultado->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Nombre</th>
                <th>Puntos</th>
                <th>Extra</th>
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

$conexion->close();
echo "<a href='mostrarcartas.php'>Volver al juego</a>";
?>
