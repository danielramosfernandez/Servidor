<?php
require_once 'conexion.php';
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== "director") {
    header("Location: inicio.php");
    exit();
}

$notaEncontrada = false;
$notaActual = null;

// Paso 1: Buscar nota existente
if (
    isset($_POST["buscar"]) &&
    isset($_POST["alumno"]) &&
    isset($_POST["asignatura"]) &&
    isset($_POST["fecha"])
) {
    $alumno = $_POST["alumno"];
    $asignatura = $_POST["asignatura"];
    $fecha = $_POST["fecha"];

    $stmt = $conn->prepare("SELECT nota FROM notas WHERE alumno = ? AND asignatura = ? AND fecha = ?");
    $stmt->bind_param("sss", $alumno, $asignatura, $fecha);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $notaActual = $fila['nota'];
        $notaEncontrada = true;
    } else {
        $_SESSION['message'] = 'No se encontró ninguna nota con esos datos.';
        $_SESSION['message_type'] = 'danger';
    }
}

// Paso 2: Guardar modificación
if (
    isset($_POST["modificar"]) &&
    isset($_POST["alumno"]) &&
    isset($_POST["asignatura"]) &&
    isset($_POST["fecha"]) &&
    isset($_POST["nueva_nota"])
) {
    $alumno = $_POST["alumno"];
    $asignatura = $_POST["asignatura"];
    $fecha = $_POST["fecha"];
    $nuevaNota = $_POST["nueva_nota"];

    $update = $conn->prepare("UPDATE notas SET nota = ? WHERE alumno = ? AND asignatura = ? AND fecha = ?");
    $update->bind_param("ssss", $nuevaNota, $alumno, $asignatura, $fecha);
    if ($update->execute()) {
        $_SESSION['message'] = 'Nota modificada correctamente.';
        $_SESSION['message_type'] = 'success';
        header("Location: ../paginas/menu-director.php");
        exit();
    } else {
        $_SESSION['message'] = 'Error al modificar: ' . $conn->error;
        $_SESSION['message_type'] = 'danger';
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Nota</title>
</head>
<body>
    <h1>Modificar Nota</h1>

    <!-- Paso 1: Formulario para buscar la nota -->
    <form method="POST">
        <label for="alumno">Alumno:</label>
        <input type="text" name="alumno" id="alumno" value="<?= $_POST['alumno'] ?? '' ?>" required><br><br>

        <label for="asignatura">Asignatura:</label>
        <input type="text" name="asignatura" id="asignatura" value="<?= $_POST['asignatura'] ?? '' ?>" required><br><br>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" value="<?= $_POST['fecha'] ?? '' ?>" max="<?= date('Y-m-d') ?>" required><br><br>

        <button type="submit" name="buscar">Buscar Nota</button>
    </form>

    <!-- Paso 2: Mostrar y modificar nota si fue encontrada -->
    <?php if ($notaEncontrada): ?>
        <hr>
        <h2>Modificar Nota Encontrada</h2>
        <form method="POST">
            <input type="hidden" name="alumno" value="<?= htmlspecialchars($alumno) ?>">
            <input type="hidden" name="asignatura" value="<?= htmlspecialchars($asignatura) ?>">
            <input type="hidden" name="fecha" value="<?= htmlspecialchars($fecha) ?>">

            <label for="nueva_nota">Nota actual: <?= htmlspecialchars($notaActual) ?>. Nueva Nota:</label>
            <input type="number" name="nueva_nota" id="nueva_nota" min="0" max="10" step="0.01" required><br><br>

            <button type="submit" name="modificar">Guardar Cambios</button>
        </form>
    <?php endif; ?>
</body>
</html>
