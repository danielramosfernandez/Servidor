<?php
require_once 'conexion.php';
session_start();

// Comprobar si el usuario está autenticado y tiene rol de director
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== "director") { 
    header("Location: inicio.php");
    exit();
}

// Verificar que los datos necesarios están presentes en POST
if (
    isset($_POST["alumno"]) &&
    isset($_POST["asignatura"]) &&
    isset($_POST["fecha"])
) {
    $alumno = $_POST["alumno"];
    $asignatura = $_POST["asignatura"];
    $fecha = $_POST["fecha"];

    // Consulta segura con sentencia preparada
    $stmt = $conn->prepare("DELETE FROM notas WHERE alumno = ? AND asignatura = ? AND fecha = ?");
    $stmt->bind_param("sss", $alumno, $asignatura, $fecha);
    $result = $stmt->execute();

    if ($result) {
        $_SESSION['message'] = 'Nota eliminada correctamente';
        $_SESSION['message_type'] = 'success';
        header("Location: ../paginas/menu-director.php");
        exit(); 
    } else {
        $_SESSION['message'] = 'Error al eliminar: ' . $conn->error;
        $_SESSION['message_type'] = 'danger';
        header("Location: ../paginas/menu-director.php");
        exit(); 
    }
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Si el método es POST pero faltan datos
    $_SESSION['message'] = 'Faltan datos para eliminar la nota.';
    $_SESSION['message_type'] = 'danger';
    header("Location: ../paginas/menu-director.php"); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Nota</title>
</head>
<body>
    <h1>Eliminar Nota</h1>
    <form action="" method="POST">
        <label for="alumno">Alumno:</label>
        <input type="text" name="alumno" id="alumno" required><br><br>

        <label for="asignatura">Asignatura:</label>
        <input type="text" name="asignatura" id="asignatura" required><br><br>

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha" max="<?php echo date('Y-m-d'); ?>" required><br><br>

        <p>¿Estás seguro de que deseas eliminar esta nota?</p>
        <button type="submit">Eliminar</button>
    </form>
</body>
</html>
