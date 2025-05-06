<?php
require_once 'conexion.php';
session_start();

// Verificación de sesión y rol
if (!isset($_SESSION['id']) || $_SESSION['rol'] !== "alumno") {
    header("Location: inicio.php");
    exit();
}

$id_alumno = $_SESSION['id'];
$nombre_usuario = $_SESSION['usu']; // Solo para mostrarlo en pantalla

// Buscar las notas del alumno por ID
$sql = "SELECT asignatura, nota FROM notas WHERE alumno = ? ORDER BY asignatura";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_alumno); // "i" porque es un entero
$stmt->execute();
$result = $stmt->get_result();

echo "<h1>" . htmlspecialchars($nombre_usuario) . ", tus notas son:</h1>";

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Asignatura</th>
                <th>Nota</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['asignatura']) . "</td>
                <td>" . htmlspecialchars($row['nota']) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No se encontraron notas para " . htmlspecialchars($nombre_usuario) . ".</p>";
}

echo "<br><form action='menu-alumno.php' method='get'>
        <button type='submit'>Volver al menú</button>
      </form>";

$stmt->close();
?>
