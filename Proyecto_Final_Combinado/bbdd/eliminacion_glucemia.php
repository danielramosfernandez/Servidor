<?php
require_once '../bbdd/conexion.php';
session_start();


if (!isset($_SESSION["id_usu"])) {
    $_SESSION['message'] = 'No estás autenticado. Inicia sesión.';
    $_SESSION['message_type'] = 'danger';
    header("Location: ../index.php");
    exit();  
}


if (isset($_POST["fecha"]) && isset($_POST["tipo_glucemia"])) {
    $id = $_SESSION["id_usu"];
    $fecha = $_POST["fecha"];
    $tipo_glucemia = $_POST["tipo_glucemia"]; 


    if ($tipo_glucemia === "hiperglucemia" || $tipo_glucemia === "hipoglucemia") {
        $sql = "DELETE FROM $tipo_glucemia WHERE id_usu = ? AND fecha = ?";
    } else {
        $_SESSION['message'] = 'Tipo de glucemia no válido.';
        $_SESSION['message_type'] = 'warning';
        header("Location: ../menu.php");
        exit();  
    }


    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "is", $id, $fecha);
        $success = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        if ($success) {
            $_SESSION['message'] = 'Registro de glucemia eliminado con éxito.';
            $_SESSION['message_type'] = 'success';
            header("Location:../paginas/exito.php");
            exit();  
        } else {
            $_SESSION['message'] = 'Error al eliminar el registro.';
            $_SESSION['message_type'] = 'danger';
            header("Location: ../paginas/error.php");
            exit();  
        }
    } else {
        $_SESSION['message'] = 'Error en la preparación de la consulta.';
        $_SESSION['message_type'] = 'danger';
        header("Location: ../paginas/error.php");
        exit();  
    }
} else {
    $_SESSION['message'] = 'Todos los campos son obligatorios.';
    $_SESSION['message_type'] = 'warning';
    header("Location: ../paginas/error.php");
    exit();  
}
?>
