<?php
ob_start(); // Inicia el búfer de salida

require_once 'conexion.php'; // Include the DB connection
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: ../index.php");
    exit;
}

// Depuración: Verificar los datos que llegan al script
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// Verificar si los datos del formulario están completos
if (isset($_POST["glucosa1"], $_POST["glucosa2"], $_POST["raciones"], $_POST["insulina"])) {
    $gl_1h = $_POST["glucosa1"];
    $gl_2h = $_POST["glucosa2"];
    $raciones = $_POST["raciones"];
    $insulina = $_POST["insulina"];

    // Obtener 'fecha' e 'id_usu' de la sesión
    if (isset($_SESSION["fecha"], $_SESSION["id_usu"])) {
        $fecha = $_SESSION["fecha"];
        $id_usu = $_SESSION["id_usu"];
    } else {
        die("Error: Faltan datos en la sesión.");
    }

    // Asumimos que el tipo de comida es fijo, por ejemplo "cena", no lo recibimos del formulario
    $tipo_comida = 'cena'; // Cambiar a la comida fija que desees

    // Consulta SQL para actualizar el registro de comida
    $sql_update = "UPDATE comida 
    SET gl_1h = ?, 
        gl_2h = ?, 
        raciones = ?, 
        insulina = ? 
    WHERE fecha = ? AND id_usu = ? AND tipo_comida = ?";

    if ($conn) {
        $stmt_update = $conn->prepare($sql_update);
        if ($stmt_update) {
            // Vincular parámetros y ejecutar la consulta
            $stmt_update->bind_param("iiissss", $gl_1h, $gl_2h, $raciones, $insulina, $fecha, $id_usu, $tipo_comida);

            if ($stmt_update->execute()) {
                // Verificar si se actualizó el registro
                if ($stmt_update->affected_rows > 0) {
                    header("Location:../paginas/exito.php");
                    exit();
                } else {
                    echo "No se encontró el registro para actualizar.";
                }
            } else {
                die("Error al ejecutar la consulta: " . $stmt_update->error);
            }

            $stmt_update->close();
        } else {
            die("Error en la preparación de la consulta: " . $conn->error);
        }
    } else {
        die("Error en la conexión a la base de datos.");
    }
} else {
    die("Error: Faltan datos en el formulario.");
}

ob_end_flush(); // Envía el contenido del búfer al navegador
?>