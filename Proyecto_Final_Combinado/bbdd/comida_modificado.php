<?php
require_once 'conexion.php'; 
session_start();


if (!isset($_SESSION["usuario"])) {
    header("Location: ../index.php");
    exit;
}


if (isset($_POST["fecha"], $_POST["comida"])) {
  
    $fecha = $_POST["fecha"];
    $tipo_comida = $_POST["comida"];
    $id_usu = $_SESSION["id_usu"]; 


    $_SESSION["fecha"] = $fecha;
    $_SESSION["id_usu"] = $id_usu;


    $sql_check = "SELECT * FROM comida WHERE fecha = ? AND id_usu = ? AND tipo_comida = ?";

    if ($conn) {
      
        $stmt_check = $conn->prepare($sql_check);
        if ($stmt_check) {
         
            $stmt_check->bind_param("sss", $fecha, $id_usu, $tipo_comida);

       
            $stmt_check->execute();
            $result = $stmt_check->get_result();

            if ($result->num_rows > 0) {
               
                header("Location: ../paginas/actualizar_comida.php?fecha=$fecha&comida=$tipo_comida");
                exit();
            } else {
                
                $_SESSION['message'] = 'No se encontró el registro con la fecha y tipo de comida proporcionados';
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