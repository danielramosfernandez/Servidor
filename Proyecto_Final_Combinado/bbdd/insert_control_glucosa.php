<?php
// Incluir archivo de conexión
require 'conexion.php'; // Asegúrate de que la ruta sea correcta

// Obtener datos del formulario
$fecha = date('Y-m-d'); // Puedes cambiar esto si necesitas una fecha específica
$deporte = $_POST['deporte'];
$lenta = $_POST['lenta'];
$id_usu = 1; // Cambia esto por el ID del usuario que estás registrando (puede venir del formulario)

// Insertar en CONTROL_GLUCOSA
$sql_control = "INSERT INTO control_glucosa (fecha, deporte, lenta, id_usu) VALUES (?, ?, ?, ?)";
$stmt_control = $conn->prepare($sql_control);
$stmt_control->bind_param("siii", $fecha, $deporte, $lenta, $id_usu);
$stmt_control->execute();

// Verificar si se registró correctamente
if ($stmt_control->affected_rows > 0) {
    // Obtener el ID del último control glucosa insertado
    $id_control = $stmt_control->insert_id;

    // Redirigir a la página de inserción de comida con el ID de control
    header("Location: insert_comida.php?id_control=$id_control");
    exit();
} else {
    // Manejar error
    echo "Error al insertar en control_glucosa.";
}

// Cerrar conexiones
$stmt_control->close();
$conn->close();
?>
