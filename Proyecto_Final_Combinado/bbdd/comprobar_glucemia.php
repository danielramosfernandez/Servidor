<?php
require_once 'conexion.php'; 
session_start();


if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit;
}


if (isset($_POST["fecha"], $_POST["glucemia"])) {
    $fecha = $_POST["fecha"];
    $tipo_glucemia = $_POST["glucemia"];
    $id_usu = $_SESSION["id_usu"];

    $_SESSION["fecha"] = $fecha;
    $_SESSION["id_usu"] = $id_usu;

    
    $sql_check_hiper = "SELECT * FROM hiperglucemia WHERE fecha = ? AND id_usu = ?";
    $sql_check_hipo = "SELECT * FROM hipoglucemia WHERE fecha = ? AND id_usu = ?";

    if ($conn) {
        $stmt_hiper = $conn->prepare($sql_check_hiper);
        $stmt_hipo = $conn->prepare($sql_check_hipo);

        if ($stmt_hiper && $stmt_hipo) {
           
            $stmt_hiper->bind_param("ss", $fecha, $id_usu);
            $stmt_hiper->execute();
            $result_hiper = $stmt_hiper->get_result();


            $stmt_hipo->bind_param("ss", $fecha, $id_usu);
            $stmt_hipo->execute();
            $result_hipo = $stmt_hipo->get_result();

            if ($result_hiper->num_rows > 0) {
               
                header("Location: ../paginas/actualizar_glucemia.php?fecha=$fecha&tipo=hiperglucemia");
                exit();
            } elseif ($result_hipo->num_rows > 0) {
               
                header("Location: ../paginas/actualizar_glucemia.php?fecha=$fecha&tipo=hipoglucemia");
                exit();
            } else {
                /
                $_SESSION['message'] = 'No se encontró un registro de glucemia para la fecha proporcionada';
                $_SESSION['message_type'] = 'danger';
                header('Location: menu.php');
                exit();
            }

            $stmt_hiper->close();
            $stmt_hipo->close();
        } else {
            $_SESSION['message'] = 'Error en la preparación de la consulta';
            $_SESSION['message_type'] = 'danger';
            header('Location: menu.php');
            exit();
        }
    } else {
        $_SESSION['message'] = 'Fallo en la conexión con la base de datos';
        $_SESSION['message_type'] = 'danger';
        header('Location: menu.php');
        exit();
    }
} else {
    $_SESSION['message'] = 'Faltan datos en el formulario';
    $_SESSION['message_type'] = 'danger';
    header('Location: menu.php');
    exit();
}
?>
