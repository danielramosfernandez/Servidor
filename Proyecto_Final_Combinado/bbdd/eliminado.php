<?php
require_once 'conexion.php';
session_start();

if (isset($_SESSION["id_usu"]) && isset($_POST["fecha"])) {
    $id = $_SESSION["id_usu"];
    $fecha = $_POST["fecha"];

    // Asegurar que la fecha esté entre comillas
    $sql = "DELETE FROM control_glucosa WHERE id_usu=$id AND fecha='$fecha'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = 'Control eliminado correctamente';
        $_SESSION['message_type'] = 'success';
        header("Location:../paginas/exito.php");
        exit(); // Es importante usar exit después de header para evitar cualquier otra ejecución del código
    } else {
        $_SESSION['message'] = 'Error al eliminar: ' . mysqli_error($conn);
        $_SESSION['message_type'] = 'danger';
        header("Location:../paginas/error.php"); // Redirigir a una página de error si ocurre algún problema
        exit(); // Evitar que el código continúe ejecutándose
    }
} else {
    if (!isset($_SESSION["id_usu"])) {
        echo "No estás autenticado. Por favor, inicia sesión.";
    }
    
    if (!isset($_POST["fecha"])) {
        echo "La fecha es obligatoria.";
    }
    header("Location: ../paginas/error.php"); // Redirigir en caso de que falte la fecha o la sesión
    exit();
}
?>