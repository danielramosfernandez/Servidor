<?php
ob_start(); 

require_once 'conexion.php';
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: ../index.php");
    exit;
}

// Depuración: Verificar los datos que llegan al script
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";


if (isset($_POST["glucosa1"], $_POST["glucosa2"], $_POST["raciones"], $_POST["insulina"])) {
    $gl_1h = $_POST["glucosa1"];
    $gl_2h = $_POST["glucosa2"];
    $raciones = $_POST["raciones"];
    $insulina = $_POST["insulina"];

   
    if (isset($_SESSION["fecha"], $_SESSION["id_usu"])) {
        $fecha = $_SESSION["fecha"];
        $id_usu = $_SESSION["id_usu"];
    } else {
        die("Error: Faltan datos en la sesión.");
    }

    $tipo_comida = 'cena'; 


    $sql_update = "UPDATE comida 
    SET gl_1h = ?, 
        gl_2h = ?, 
        raciones = ?, 
        insulina = ? 
    WHERE fecha = ? AND id_usu = ? AND tipo_comida = ?";

    if ($conn) {
        $stmt_update = $conn->prepare($sql_update);
        if ($stmt_update) {
           
            $stmt_update->bind_param("iiissss", $gl_1h, $gl_2h, $raciones, $insulina, $fecha, $id_usu, $tipo_comida);

            if ($stmt_update->execute()) {
               
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

ob_end_flush(); 
?>