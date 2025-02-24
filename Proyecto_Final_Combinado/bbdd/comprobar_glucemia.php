<?php
require_once 'conexion.php'; // Incluye la conexión a la base de datos
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit;
}

// Verificar si se han enviado los parámetros 'fecha' y 'glucemia'
if (isset($_POST["fecha"], $_POST["glucemia"])) {
    $fecha = $_POST["fecha"];
    $tipo_glucemia = $_POST["glucemia"];
    $id_usu = $_SESSION["id_usu"];

    // Guardar la fecha y el id del usuario en la sesión
    $_SESSION["fecha"] = $fecha;
    $_SESSION["id_usu"] = $id_usu;

    // Consultas para verificar si el registro existe en alguna de las tablas
    $sql_check_hiper = "SELECT * FROM hiperglucemia WHERE fecha = ? AND id_usu = ?";
    $sql_check_hipo = "SELECT * FROM hipoglucemia WHERE fecha = ? AND id_usu = ?";

    if ($conn) {
        $stmt_hiper = $conn->prepare($sql_check_hiper);
        $stmt_hipo = $conn->prepare($sql_check_hipo);

        if ($stmt_hiper && $stmt_hipo) {
            // Verificar en hiperglucemia
            $stmt_hiper->bind_param("ss", $fecha, $id_usu);
            $stmt_hiper->execute();
            $result_hiper = $stmt_hiper->get_result();

            // Verificar en hipoglucemia
            $stmt_hipo->bind_param("ss", $fecha, $id_usu);
            $stmt_hipo->execute();
            $result_hipo = $stmt_hipo->get_result();

            if ($result_hiper->num_rows > 0) {
                // Si existe en hiperglucemia, redirigir a actualizar_glucemia.php con tipo hiperglucemia
                header("Location: ../paginas/actualizar_glucemia.php?fecha=$fecha&tipo=hiperglucemia");
                exit();
            } elseif ($result_hipo->num_rows > 0) {
                // Si existe en hipoglucemia, redirigir con tipo hipoglucemia
                header("Location: ../paginas/actualizar_glucemia.php?fecha=$fecha&tipo=hipoglucemia");
                exit();
            } else {
                // Si no existe en ninguna tabla, mostrar mensaje de error
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
