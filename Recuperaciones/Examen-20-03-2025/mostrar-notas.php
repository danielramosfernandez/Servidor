<?php
require_once('conexion.php');
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== "director") { 
    header("Location: inicio.php");
    exit();
}

$query = "SELECT alumno, asignatura, fecha, nota FROM notas";
$result = $conn->query($query);

if (!$result) {
    die("Error al recuperar las notas");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Notas de Alumnos</title>
</head>
<body>

    <h1>Notas de Todos los Alumnos</h1>

    <table border="1">
        <tr>
            <th>Alumno</th>
            <th>Asignatura</th>
            <th>Fecha</th>
            <th>Nota</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['alumno']; ?></td>
            <td><?php echo $row['asignatura']; ?></td>
            <td><?php echo $row['fecha']; ?></td>
            <td><?php echo $row['nota']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <button onclick="window.location.href='menu-director.php'">Volver al menu</button>
</body>
</html>
