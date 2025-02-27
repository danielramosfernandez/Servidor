<?php
// Incluir archivo de conexión
require 'conexion.php'; // Asegúrate de que la ruta sea correcta
session_start();
// Obtener datos del formulario
$fecha = date('Y-m-d'); // Puedes cambiar esto si necesitas una fecha específica
$deporte = $_POST['deporte'];
$lenta = $_POST['lenta'];
$id_usu = $_SESSION['id_usu']; // Asegúrate de que este ID exista en la tabla usuario

// Insertar en CONTROL_GLUCOSA
$sql_control = "INSERT INTO control_glucosa (fecha, deporte, lenta, id_usu) VALUES (?, ?, ?, ?)";
$stmt_control = $conn->prepare($sql_control);

try {
    $stmt_control->bind_param("ssii", $fecha, $deporte, $lenta, $id_usu);
    $stmt_control->execute();

    // Verificar si se registró correctamente
    if ($stmt_control->affected_rows > 0) {
        // Obtener el ID del último control glucosa insertado
        $id_control = $stmt_control->insert_id;

        header("Location:../paginas/exito.php");
        exit();
    } else {
        throw new Exception("Error al insertar en control_glucosa.");
    }
} catch (mysqli_sql_exception $e) {
    echo "Error: " . $e->getMessage();
}

// Cerrar conexiones
$stmt_control->close();
$conn->close();
?>
