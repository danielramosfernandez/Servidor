<?php
require_once 'conexion.php';
session_start();

if ($_SESSION['rol'] !== "director") {
    header("Location: inicio.php");
    exit();
}

$mensaje = "";
$notaActual = null;

// Buscar nota
if (isset($_POST["buscar"], $_POST["alumno"], $_POST["asignatura"], $_POST["fecha"])) {
    $stmt = $conn->prepare("SELECT nota FROM notas WHERE alumno = ? AND asignatura = ? AND fecha = ?");
    $stmt->bind_param("sss", $_POST["alumno"], $_POST["asignatura"], $_POST["fecha"]);
    $stmt->execute();
    $res = $stmt->get_result();
    $notaActual = $res->num_rows > 0 ? $res->fetch_assoc()['nota'] : null;
    $mensaje = $notaActual ? "" : "No se encontró ninguna nota.";
}

// Modificar nota
if (isset($_POST["modificar"], $_POST["alumno"], $_POST["asignatura"], $_POST["fecha"], $_POST["nueva_nota"])) {
    $stmt = $conn->prepare("UPDATE notas SET nota = ? WHERE alumno = ? AND asignatura = ? AND fecha = ?");
    $stmt->bind_param("ssss", $_POST["nueva_nota"], $_POST["alumno"], $_POST["asignatura"], $_POST["fecha"]);
    if ($stmt->execute()) {
        header("Location: ../paginas/menu-director.php");
        exit();
    } else {
        $mensaje = "Error al modificar.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Modificar Nota</title></head>
<body>
    <h1>Modificar Nota</h1>
    <form method="POST">
        Alumno: <input type="text" name="alumno" value="<?= $_POST['alumno'] ?? '' ?>" required><br>
        Asignatura: <input type="text" name="asignatura" value="<?= $_POST['asignatura'] ?? '' ?>" required><br>
        Fecha: <input type="date" name="fecha" value="<?= $_POST['fecha'] ?? '' ?>" max="<?= date('Y-m-d') ?>" required><br>
        <button type="submit" name="buscar">Buscar Nota</button>
    </form>

    <?php if ($notaActual): ?>
        <hr>
        <form method="POST">
            <input type="hidden" name="alumno" value="<?= $_POST['alumno'] ?>">
            <input type="hidden" name="asignatura" value="<?= $_POST['asignatura'] ?>">
            <input type="hidden" name="fecha" value="<?= $_POST['fecha'] ?>">
            Nota actual: <?= $notaActual ?> <br>
            Nueva Nota: <input type="number" name="nueva_nota" min="0" max="10" step="0.01" required><br>
            <button type="submit" name="modificar">Guardar Cambios</button>
        </form>
    <?php elseif ($mensaje): ?>
        <p><?= $mensaje ?></p>
    <?php endif; ?>
</body>
</html>
