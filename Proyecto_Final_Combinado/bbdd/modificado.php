<?php
require_once 'conexion.php';
session_start();


if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit;
}


if (isset($_POST["fecha"])) {
 
    $fecha = $_POST["fecha"];
    $id_usu = $_SESSION["id_usu"]; 


    $_SESSION["fecha"] = $fecha;
    $_SESSION["id_usu"] = $id_usu;


    $sql_check = "SELECT * FROM control_glucosa WHERE fecha = ? AND id_usu = ?";

    if ($conn) {
       
        $stmt_check = $conn->prepare($sql_check);
        if ($stmt_check) {
    
            $stmt_check->bind_param("ss", $fecha, $id_usu);

          
            $stmt_check->execute();
            $result = $stmt_check->get_result();

            if ($result->num_rows > 0) {
               
                header("Location: ../paginas/actualizar.php?fecha=$fecha");
                exit();
            } else {

                $_SESSION['message'] = 'No se encontró el registro con la fecha proporcionada';
                $_SESSION['message_type'] = 'danger';
                header('Location: menu.php');
                exit();
            }

            $stmt_check->close();
        } else {
            $_SESSION['message'] = 'Error en la preparación de la consulta de verificación';
            $_SESSION['message_type'] = 'danger';
            header('Location: menu.php');
            exit();
        }
    } else {
        $_SESSION['message'] = 'Conexión a la base de datos fallida';
        $_SESSION['message_type'] = 'danger';
        header('Location: menu.php');
        exit();
    }
} else {
    $_SESSION['message'] = 'Faltan datos en el formulario.';
    $_SESSION['message_type'] = 'danger';
    header('Location: menu.php');
    exit();
}
?>
