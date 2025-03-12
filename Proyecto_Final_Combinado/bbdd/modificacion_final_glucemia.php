<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'conexion.php';
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: ../index.php");
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

        $glucosa = null;
        $hora = null;
        $correccion = null;

    
        if ($tipo_glucemia === "hiperglucemia" && isset($_POST["glucosa_hiperglucemia"], $_POST["hora_hiperglucemia"], $_POST["correccion_hiperglucemia"])) {
            $glucosa = $_POST["glucosa_hiperglucemia"];
            $hora = $_POST["hora_hiperglucemia"];
            $correccion = $_POST["correccion_hiperglucemia"];
            $tabla = "hiperglucemia"; 
        } elseif ($tipo_glucemia === "hipoglucemia" && isset($_POST["glucosa_hipoglucemia"], $_POST["hora_hipoglucemia"])) {
            $glucosa = $_POST["glucosa_hipoglucemia"];
            $hora = $_POST["hora_hipoglucemia"];
            $correccion = null; 
            $tabla = "hipoglucemia";
        } else {
            die("Error: Datos incompletos en el formulario.");
        }
        if ($tabla === "hiperglucemia") {
            $sql_update = "UPDATE hiperglucemia SET glucosa = ?, hora = ?, correccion = ? WHERE fecha = ? AND id_usu = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("sssss", $glucosa, $hora, $correccion, $fecha, $id_usu);
        } else { 
            $sql_update = "UPDATE hipoglucemia SET glucosa = ?, hora = ? WHERE fecha = ? AND id_usu = ?";
            $stmt_update = $conn->prepare($sql_update);
            $stmt_update->bind_param("ssss", $glucosa, $hora, $fecha, $id_usu);
        }

        if ($stmt_update) {
           
            if ($stmt_update->execute()) {
                if ($stmt_update->affected_rows > 0) {
                    header("Location:../paginas/exito.php");
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