<?php
require_once 'conexion.php'; // Include the DB connection
session_start();

// Check if the user is logged in
if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit;
}

// Check if the required form data is submitted
if (isset($_POST["deporte"]) && isset($_POST["lenta"])) {
    // Get the form data
    $deporte = $_POST["deporte"];
    $lenta = $_POST["lenta"];

    // Get 'fecha' and 'id_usu' from session
    if (isset($_SESSION["fecha"]) && isset($_SESSION["id_usu"])) {
        $fecha = $_SESSION["fecha"];
        $id_usu = $_SESSION["id_usu"];
    } else {
        $_SESSION['message'] = 'Faltan datos en la sesión para actualizar.';
        $_SESSION['message_type'] = 'danger';
        header('Location: ../paginas/menu.php');
        exit();
    }

    // Debugging output to ensure the data is being passed correctly
    // echo "Deporte: $deporte, Lenta: $lenta, Fecha: $fecha, ID Usuario: $id_usu"; // Uncomment to debug

    // SQL query to update the record
    $sql_update = "UPDATE control_glucosa 
                   SET deporte = ?, 
                       lenta = ? 
                   WHERE fecha = ? AND id_usu = ?";

    if ($conn) {
        $stmt_update = $conn->prepare($sql_update);
        if ($stmt_update) {
            // Bind the parameters and execute the update query
            $stmt_update->bind_param("sssi", $deporte, $lenta, $fecha, $id_usu);

            if ($stmt_update->execute()) {
                $_SESSION['message'] = 'Control de glucosa actualizado correctamente';
                $_SESSION['message_type'] = 'success';
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

    // Redirect to the menu or desired page
    header('Location: ../paginas/menu.php');
    exit();
} else {
    $_SESSION['message'] = 'Faltan datos en el formulario.';
    $_SESSION['message_type'] = 'danger';
    header('Location: ../paginas/menu.php');
    exit();
}
?>