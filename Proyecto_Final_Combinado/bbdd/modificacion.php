<?php
require_once 'conexion.php'; 
session_start();


if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit;
}


if (isset($_POST["deporte"]) && isset($_POST["lenta"])) {

    $deporte = $_POST["deporte"];
    $lenta = $_POST["lenta"];


    if (isset($_SESSION["fecha"]) && isset($_SESSION["id_usu"])) {
        $fecha = $_SESSION["fecha"];
        $id_usu = $_SESSION["id_usu"];
    } else {
        $_SESSION['message'] = 'Faltan datos en la sesión para actualizar.';
        $_SESSION['message_type'] = 'danger';
        header('Location: ../paginas/menu.php');
        exit();
    }


    $sql_update = "UPDATE control_glucosa 
                   SET deporte = ?, 
                       lenta = ? 
                   WHERE fecha = ? AND id_usu = ?";

    if ($conn) {
        $stmt_update = $conn->prepare($sql_update);
        if ($stmt_update) {

            $stmt_update->bind_param("sssi", $deporte, $lenta, $fecha, $id_usu);

            if ($stmt_update->execute()) {
                $_SESSION['message'] = 'Control de glucosa actualizado correctamente';
                $_SESSION['message_type'] = 'success';
                header("Location:../paginas/exito.php");
            } else {
                $_SESSION['message'] = 'Error al actualizar el control de glucosa. Verifica la fecha e ID.';
                $_SESSION['message_type'] = 'danger';
            }

            $stmt_update->close();
        } else {
            $_SESSION['message'] = 'Error en la preparación de la consulta de actualización';
            $_SESSION['message_type'] = 'danger';
        }
    } else {
        $_SESSION['message'] = 'Conexión a la base de datos fallida';
        $_SESSION['message_type'] = 'danger';
    }

   
    header('Location: ../paginas/menu.php');
    exit();
} else {
    $_SESSION['message'] = 'Faltan datos en el formulario.';
    $_SESSION['message_type'] = 'danger';
    header('Location: ../paginas/menu.php');
    exit();
}
?>