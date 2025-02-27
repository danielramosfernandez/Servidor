<?php
require_once '../bbdd/conexion.php';
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION["id_usu"])) {
    $_SESSION['message'] = 'No estás autenticado. Inicia sesión.';
    $_SESSION['message_type'] = 'danger';
    header("Location: ../login.php");
    exit();
}

// Verificar si los datos del formulario están presentes
if (isset($_POST["fecha"]) && isset($_POST["comida"])) {
    $id = $_SESSION["id_usu"];
    $fecha = $_POST["fecha"];
    $comida = $_POST["comida"];

    // Consulta preparada para evitar SQL Injection
    $sql = "DELETE FROM comida WHERE id_usu = ? AND fecha = ? AND tipo_comida = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "iss", $id, $fecha, $comida);
        $success = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($success) {
            $_SESSION['message'] = 'Registro eliminado con éxito.';
            $_SESSION['message_type'] = 'success';
            header("Location:../paginas/exito.php");
        } else {
            $_SESSION['message'] = 'Error al eliminar el registro.';
            $_SESSION['message_type'] = 'danger';
        }
    } else {
        $_SESSION['message'] = 'Error en la preparación de la consulta.';
        $_SESSION['message_type'] = 'danger';
    }
} else {
    $_SESSION['message'] = 'Todos los campos son obligatorios.';
    $_SESSION['message_type'] = 'warning';
}

// Redirigir de vuelta al menú
header("Location: ../menu.php");
exit();
?>
