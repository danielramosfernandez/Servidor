<?php
require_once 'conexion.php';
session_start();

if (isset($_SESSION["id_usu"]) && isset($_POST["fecha"])) {
    $id = $_SESSION["id_usu"];
    $fecha = $_POST["fecha"];

    $sql = "DELETE FROM control_glucosa WHERE id_usu=$id AND fecha='$fecha'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['message'] = 'Control eliminado correctamente';
        $_SESSION['message_type'] = 'success';
        header("Location:../paginas/exito.php");
        exit(); 
    } else {
        $_SESSION['message'] = 'Error al eliminar: ' . mysqli_error($conn);
        $_SESSION['message_type'] = 'danger';
        header("Location:../paginas/error.php");
        exit(); 
    }
} else {
    if (!isset($_SESSION["id_usu"])) {
        echo "No estás autenticado. Por favor, inicia sesión.";
    }
    
    if (!isset($_POST["fecha"])) {
        echo "La fecha es obligatoria.";
    }
    header("Location: ../paginas/error.php"); 
    exit();
}
?>