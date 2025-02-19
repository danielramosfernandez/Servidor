<?php
// Iniciar la sesión y conectar a la base de datos
session_start();
require_once('../bbdd/conexion.php'); // Asegúrate de que el archivo de conexión a la base de datos esté en la ubicación correcta

// Obtener la fecha desde el primer script
$fecha = date('Y-m-d');

// Verificar que los datos del formulario estén presentes
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los datos de la comida
    $comida = $_POST['comida'];
    $glucosa1 = $_POST['glucosa1'];  
    $glucosa2 = $_POST['glucosa2'];
    $insulina = $_POST['insulina'];
    $raciones = $_POST['raciones'];

    // Recoger los datos de glucemia
    $glucemia = $_POST['glucemia'];
    $glucosa_hiperglucemia = isset($_POST['glucosa_hiperglucemia']) ? $_POST['glucosa_hiperglucemia'] : null;
    $hora_hiperglucemia = isset($_POST['hora_hiperglucemia']) ? $_POST['hora_hiperglucemia'] : null;
    $correccion_hiperglucemia = isset($_POST['correccion_hiperglucemia']) ? $_POST['correccion_hiperglucemia'] : null;

    $glucosa_hipoglucemia = isset($_POST['glucosa_hipoglucemia']) ? $_POST['glucosa_hipoglucemia'] : null;
    $hora_hipoglucemia = isset($_POST['hora_hipoglucemia']) ? $_POST['hora_hipoglucemia'] : null;

    // Obtener el ID del usuario (asumimos que se encuentra en la sesión)
    $id_usu = $_SESSION['id_usu']; // Asegúrate de tener 'id_usuario' en la sesión

    // Insertar datos de la comida en la base de datos
    $query_comida = "INSERT INTO comida (tipo_comida, gl_1h, gl_2h, insulina, raciones, fecha, id_usu) 
                     VALUES ('$comida', '$glucosa1', '$glucosa2', '$insulina', '$raciones', '$fecha', '$id_usu')";

    if (mysqli_query($conn, $query_comida)) {
        // Obtener el ID de la comida insertada
        $comida_id = mysqli_insert_id($conn); // Usa $conn en lugar de $conexion

        // Insertar los detalles de hiperglucemia si corresponde
        if ($glucemia === "hiperglucemia") {
            $query_hiperglucemia = "INSERT INTO hiperglucemia ( glucosa, hora, correccion, tipo_comida, fecha, id_usu) 
                                    VALUES ('$glucosa_hiperglucemia', '$hora_hiperglucemia', '$correccion_hiperglucemia', '$comida', '$fecha', '$id_usu')";
            if (!mysqli_query($conn, $query_hiperglucemia)) { // Usa $conn en lugar de $conexion
                echo "Error al registrar hiperglucemia: " . mysqli_error($conn);
            }
        } elseif ($glucemia === "hipoglucemia") {
            $query_hipoglucemia = "INSERT INTO hipoglucemia ( glucosa, hora, tipo_comida, fecha, id_usu) 
                                   VALUES ('$glucosa_hipoglucemia', '$hora_hipoglucemia', '$comida', '$fecha', '$id_usu')";
            if (!mysqli_query($conn, $query_hipoglucemia)) { // Usa $conn en lugar de $conexion
                echo "Error al registrar hipoglucemia: " . mysqli_error($conn);
            }
        } elseif ($glucemia === "ninguno") {
            // No es necesario insertar nada si el estado es "ninguno"
        }

        echo "Comida y glucemia registrada correctamente.";
    } else {
        echo "Error al registrar la comida: " . mysqli_error($conn); // Usa $conn aquí también
    }

    // Cerrar la conexión
    mysqli_close($conn); // Usa $conn en lugar de $conexion
} else {
    echo "No se ha recibido ningún dato.";
}
?>
