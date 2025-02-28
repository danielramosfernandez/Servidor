<?php

session_start();
require_once('../bbdd/conexion.php');

$fecha = date('Y-m-d');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
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

    // 🔹 1. Verificar si la fecha e id_usu existen en control_glucosa
    $query_verificar = "SELECT * FROM control_glucosa WHERE fecha = '$fecha' AND id_usu = '$id_usu'";
    $resultado = mysqli_query($conn, $query_verificar);

    if (mysqli_num_rows($resultado) == 0) {
        // Si no existe, mostrar mensaje y redirigir
        echo "<script>
            alert('Error: Debes registrar primero la glucosa en control_glucosa.');
            window.location.href='../paginas/error.php'; // Cambia esto según tu estructura
        </script>";
        exit();
    }

    // 🔹 2. Insertar en comida si existe en control_glucosa
    $query_comida = "INSERT INTO comida (tipo_comida, gl_1h, gl_2h, insulina, raciones, fecha, id_usu) 
                     VALUES ('$comida', '$glucosa1', '$glucosa2', '$insulina', '$raciones', '$fecha', '$id_usu')";

    if (mysqli_query($conn, $query_comida)) {
        
        if ($glucemia === "hiperglucemia") {
            $query_hiperglucemia = "INSERT INTO hiperglucemia (glucosa, hora, correccion, tipo_comida, fecha, id_usu) 
                                    VALUES ('$glucosa_hiperglucemia', '$hora_hiperglucemia', '$correccion_hiperglucemia', '$comida', '$fecha', '$id_usu')";
            if (!mysqli_query($conn, $query_hiperglucemia)) { 
                echo "Error al registrar hiperglucemia: " . mysqli_error($conn);
            }
        } elseif ($glucemia === "hipoglucemia") {
            $query_hipoglucemia = "INSERT INTO hipoglucemia (glucosa, hora, tipo_comida, fecha, id_usu) 
                                   VALUES ('$glucosa_hipoglucemia', '$hora_hipoglucemia', '$comida', '$fecha', '$id_usu')";
            if (!mysqli_query($conn, $query_hipoglucemia)) { 
                echo "Error al registrar hipoglucemia: " . mysqli_error($conn);
            }
        } 

        echo "Comida y glucemia registrada correctamente."; 
        header("Location:../paginas/exito.php");
    } else {
        echo "Error al registrar la comida: " . mysqli_error($conn); 
    }

    mysqli_close($conn);
} else {
    echo "No se ha recibido ningún dato.";
}
?>
