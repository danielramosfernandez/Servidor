<?php
require_once 'conexion.php'; // Include the DB connection
session_start();

// Check if user is logged in
if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit;
}

// Check if the 'fecha' and 'comida' parameters are present
if (isset($_POST["fecha"], $_POST["comida"])) {
    // Get the 'fecha' and 'comida' from the form
    $fecha = $_POST["fecha"];
    $tipo_comida = $_POST["comida"];
    $id_usu = $_SESSION["id_usu"]; // User ID from session

    // Store 'fecha' and 'id_usu' in the session for later use
    $_SESSION["fecha"] = $fecha;
    $_SESSION["id_usu"] = $id_usu;

    // SQL query to check if the date and type of meal exist for this user
    $sql_check = "SELECT * FROM comida WHERE fecha = ? AND id_usu = ? AND tipo_comida = ?";

    if ($conn) {
        // Prepare the statement for checking
        $stmt_check = $conn->prepare($sql_check);
        if ($stmt_check) {
            // Bind parameters for the check
            $stmt_check->bind_param("sss", $fecha, $id_usu, $tipo_comida);

            // Execute the query
            $stmt_check->execute();
            $result = $stmt_check->get_result();

            if ($result->num_rows > 0) {
                // If the record exists, redirect to actualizar_comida.php to update the record
                header("Location: ../paginas/actualizar_comida.php?fecha=$fecha&comida=$tipo_comida");
                exit();
            } else {
                // If no record is found for the given date and type of meal, inform the user
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
