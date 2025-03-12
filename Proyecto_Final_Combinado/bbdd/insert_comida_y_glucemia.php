<?php
session_start();
require_once('../bbdd/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST['fecha'];
    $comida = $_POST['comida'];
    $glucosa1 = $_POST['glucosa1'];  
    $glucosa2 = $_POST['glucosa2'];
    $insulina = $_POST['insulina'];
    $raciones = $_POST['raciones'];
    $glucemia = $_POST['glucemia'];
    $glucosa_hiperglucemia = $_POST['glucosa_hiperglucemia'];
    $hora_hiperglucemia =  $_POST['hora_hiperglucemia'];
    $correccion_hiperglucemia = $_POST['correccion_hiperglucemia'];
    $glucosa_hipoglucemia = $_POST['glucosa_hipoglucemia'];
    $hora_hipoglucemia = $_POST['hora_hipoglucemia'];
    $id_usu = $_SESSION['id_usu']; 

    // 🔹 Validar que la fecha no sea futura
    $fecha_actual = date('Y-m-d');
    if ($fecha > $fecha_actual) {
        $_SESSION['error_message'] = 'No puedes seleccionar una fecha futura.';
        header("Location: ../paginas/error.php");
        exit();
    }

    // 🔹 Verificar si la fecha e id_usu existen en control_glucosa
    $query_verificar = "SELECT * FROM control_glucosa WHERE fecha = '$fecha' AND id_usu = '$id_usu'";
    $resultado = mysqli_query($conn, $query_verificar);

    if (mysqli_num_rows($resultado) == 0) {
        $_SESSION['error_message'] = 'Error: Debes registrar primero la glucosa en control_glucosa.';
        header("Location: ../paginas/error.php");
        exit();
    }

    // 🔹 Insertar en comida con la fecha seleccionada
    $query_comida = "INSERT INTO comida (tipo_comida, gl_1h, gl_2h, insulina, raciones, fecha, id_usu) 
                     VALUES ('$comida', '$glucosa1', '$glucosa2', '$insulina', '$raciones', '$fecha', '$id_usu')";

    if (mysqli_query($conn, $query_comida)) {
        if ($glucemia === "hiperglucemia") {
            $query_hiperglucemia = "INSERT INTO hiperglucemia (glucosa, hora, correccion, tipo_comida, fecha, id_usu) 
                                    VALUES ('$glucosa_hiperglucemia', '$hora_hiperglucemia', '$correccion_hiperglucemia', '$comida', '$fecha', '$id_usu')";
            if (!mysqli_query($conn, $query_hiperglucemia)) { 
                $_SESSION['error_message'] = "Error al registrar hiperglucemia: " . mysqli_error($conn);
                header("Location: ../paginas/error.php");
                exit();
            }
        } elseif ($glucemia === "hipoglucemia") {
            $query_hipoglucemia = "INSERT INTO hipoglucemia (glucosa, hora, tipo_comida, fecha, id_usu) 
                                   VALUES ('$glucosa_hipoglucemia', '$hora_hipoglucemia', '$comida', '$fecha', '$id_usu')";
            if (!mysqli_query($conn, $query_hipoglucemia)) { 
                $_SESSION['error_message'] = "Error al registrar hipoglucemia: " . mysqli_error($conn);
                header("Location: ../paginas/error.php");
                exit();
            }
        }

        $_SESSION['success_message'] = "Comida y glucemia registrada correctamente."; 
        header("Location: ../paginas/exito.php"); 
        exit();
    } else {
        $_SESSION['error_message'] = "Error al registrar la comida: " . mysqli_error($conn); 
        header("Location: ../paginas/error.php");
        exit();
    }

    mysqli_close($conn);
} else {
    $_SESSION['error_message'] = "No se ha recibido ningún dato.";
    header("Location: ../paginas/error.php");
    exit();
}
?>