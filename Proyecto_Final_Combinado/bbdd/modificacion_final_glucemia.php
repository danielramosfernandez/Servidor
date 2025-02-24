<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'conexion.php'; // Conexión a la base de datos
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["glucemia"])) {
        $tipo_glucemia = $_POST["glucemia"];
        $id_usu = $_SESSION["id_usu"] ?? null;
        $fecha = $_SESSION["fecha"] ?? null;

        if (!$id_usu || !$fecha) {
            die("Error: Faltan datos en la sesión.");
        }

        // Variables para los datos de hiperglucemia o hipoglucemia
        $glucosa = null;
        $hora = null;
        $correccion = null;

        // Comprobamos el tipo de glucemia y los datos correspondientes
        if ($tipo_glucemia === "hiperglucemia" && isset($_POST["glucosa_hiperglucemia"], $_POST["hora_hiperglucemia"], $_POST["correccion_hiperglucemia"])) {
            $glucosa = $_POST["glucosa_hiperglucemia"];
            $hora = $_POST["hora_hiperglucemia"];
            $correccion = $_POST["correccion_hiperglucemia"];
            $tabla = "hiperglucemia"; // Tabla para hiperglucemia
        } elseif ($tipo_glucemia === "hipoglucemia" && isset($_POST["glucosa_hipoglucemia"], $_POST["hora_hipoglucemia"])) {
            $glucosa = $_POST["glucosa_hipoglucemia"];
            $hora = $_POST["hora_hipoglucemia"];
            $correccion = null; // No se usa corrección para hipoglucemia
            $tabla = "hipoglucemia"; // Tabla para hipoglucemia
        } else {
            die("Error: Datos incompletos en el formulario.");
        }

        // Consulta SQL para actualizar el registro de glucemia
        if ($tabla === "hiperglucemia") {
            $sql_update = "UPDATE hiperglucemia SET glucosa = ?, hora = ?, correccion = ? WHERE fecha = ? AND id_usu = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("sssss", $glucosa, $hora, $correccion, $fecha, $id_usu);
        } else { // hipoglucemia
            $sql_update = "UPDATE hipoglucemia SET glucosa = ?, hora = ? WHERE fecha = ? AND id_usu = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("ssss", $glucosa, $hora, $fecha, $id_usu);
        }

        if ($stmt_update) {
            // Ejecutar la consulta
            if ($stmt_update->execute()) {
                if ($stmt_update->affected_rows > 0) {
                    echo "Registro de glucemia actualizado correctamente.";
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
        die("Error: Faltan datos en el formulario.");
    }
} else {
    die("Error: Método no permitido.");
}
?>
