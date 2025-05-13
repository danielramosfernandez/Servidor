<?php 
//^ Iniciamos la sesión y comprobamos el rol
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== "director") { 
    header("Location: inicio.php");
    exit();
}

require_once 'conexion.php';
$connection = new mysqli($hn, $un, $pw, $db);
if ($connection->connect_error) die("Error de conexión: " . $connection->connect_error);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introducción en masa</title>
</head>
<body>
    <h1>Introducción en masa</h1>
    <!-- Mostrar el nombre de usuario desde la sesión -->
    <h2>Hola <?php echo htmlspecialchars($_SESSION['usu']); ?></h2>

    <?php
    // Inicializamos el contador de registros grabados correctamente
    $grabados = 0;

    // Bucle para insertar cada fila
    for ($i = 1; $i <= $_SESSION['contador']; $i++) {
        $id = $_POST['alumno' . $i] ?? '';
        $asignatura = $_POST['asignatura' . $i] ?? '';
        $nota = $_POST['nota' . $i] ?? '';
        $fecha = date("Y-m-d");

        // Validación de datos vacíos
        if (empty($id) || empty($asignatura) || $nota === '') {
            echo "<p>Error en la fila $i: faltan datos.</p>";
            continue;
        }

        // Preparar y ejecutar la inserción
        $stmt = $connection->prepare("INSERT INTO notas (alumno, asignatura, fecha, nota) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssd", $id, $asignatura, $fecha, $nota);

        if (!$stmt->execute()) {
            echo "<p>Error al insertar la fila $i: " . $stmt->error . "</p>";
        } else {
            $grabados++;
        }
    }

    // Cerramos la conexión
    $connection->close();
    ?>

    <!-- Mostrar resultado final -->
    <p>Se han grabado <?php echo $grabados; ?> contactos de <?php echo htmlspecialchars($_SESSION['usu']); ?></p>

    <!-- Enlaces -->
    <a href="menu-director.php">Volver al menú principal</a><br>
    <a href="insertar-punto.php">Introducir más notas?></a><br>
    <a href="mostrar-notas.php">Ver todas las notas guardadas</a><br>
</body>
</html>
