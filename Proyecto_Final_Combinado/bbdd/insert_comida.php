<?php
// Incluir archivo de conexión
require 'conexion.php'; // Asegúrate de que la ruta sea correcta

// Obtener datos del formulario
$tipo_comida = isset($_POST['comida']) ? $_POST['comida'] : null; // Obtener el tipo de comida seleccionado
$glucosa1 = isset($_POST['glucosa1']) ? $_POST['glucosa1'] : null;
$glucosa2 = isset($_POST['glucosa2']) ? $_POST['glucosa2'] : null;
$insulina = isset($_POST['insulina']) ? $_POST['insulina'] : null;
$raciones = isset($_POST['raciones']) ? $_POST['raciones'] : null;
$fecha = date('Y-m-d'); // Puedes cambiar esto si necesitas una fecha específica
$id_usu = 1; // Cambia esto por el ID del usuario que estás registrando (puede venir del formulario)

// Preparar la consulta para COMIDA
$sql_comida = "INSERT INTO comida (tipo_comida, gl_1h, gl_2h, raciones, insulina, fecha, id_usu) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt_comida = $conn->prepare($sql_comida);

// Verificar si el tipo de comida es un array (en caso de selección múltiple)
if (is_array($tipo_comida)) {
    // Iterar sobre las comidas
    for ($i = 0; $i < count($tipo_comida); $i++) {
        $tipo_comida_value = $tipo_comida[$i];
        $glucosa1_value = $glucosa1[$i];
        $glucosa2_value = $glucosa2[$i];
        $raciones_value = $raciones[$i];
        $insulina_value = $insulina[$i];

        // Vincular parámetros y ejecutar la inserción
        $stmt_comida->bind_param("siiissi", $tipo_comida_value, $glucosa1_value, $glucosa2_value, $raciones_value, $insulina_value, $fecha, $id_usu);
        $stmt_comida->execute();
    }
} else {
    // Si solo se seleccionó un tipo de comida, insertar directamente
    $stmt_comida->bind_param("siiissi", $tipo_comida, $glucosa1, $glucosa2, $raciones, $insulina, $fecha, $id_usu);
    $stmt_comida->execute();
}

// Cerrar la declaración de comida
$stmt_comida->close();
$conn->close();

// Redirigir o mostrar mensaje de éxito
header("Location: ver_registros.php"); // Cambia esto según tu necesidad
exit();
?>
