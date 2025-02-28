<?php

require 'conexion.php'; 
session_start();

$fecha = date('Y-m-d'); 
$lenta = $_POST['lenta'];
$id_usu = $_SESSION['id_usu'];

$sql_control = "INSERT INTO control_glucosa (fecha, deporte, lenta, id_usu) VALUES (?, ?, ?, ?)";
$stmt_control = $conn->prepare($sql_control);

try {
    $stmt_control->bind_param("ssii", $fecha, $deporte, $lenta, $id_usu);
    $stmt_control->execute();


    if ($stmt_control->affected_rows > 0) {
        
        $id_control = $stmt_control->insert_id;

        header("Location:../paginas/exito.php");
        exit();
    } else {
        throw new Exception("Error al insertar en control_glucosa.");
    }
} catch (mysqli_sql_exception $e) {
    echo "Error: " . $e->getMessage();
}

$stmt_control->close();
$conn->close();
?>
