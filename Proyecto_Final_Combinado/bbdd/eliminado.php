<?php

require_once 'conexion.php'; 
session_start(); 

// Verificar si tanto la sesión como los datos del formulario están establecidos
if (isset($_SESSION["id_usu"]) && isset($_POST["fecha"])) {
    // Ambas variables están disponibles, puedes proceder con la lógica
    $id = $_SESSION["id_usu"];
    $fecha = $_POST["fecha"]; 
    $sql = "DELETE FROM control_glucosa WHERE id_usu=$id AND fecha=$fecha"; 
    $result = mysqli_query($conn, $sql); 
   


    // Aquí puedes continuar con el resto del procesamiento
} else {
    // Si alguna de las condiciones no se cumple
    if (!isset($_SESSION["id_usu"])) {
        echo "No estás autenticado. Por favor, inicia sesión.";
    }
    
    if (!isset($_POST["fecha"])) {
        echo "La fecha es obligatoria.";
    }
    
    $_SESSION['message'] = 'Control eliminado'; 
    $_SESSION['message_type'] = 'danger'; 
    header('Location: menu.php ');
    exit();  // Terminar la ejecución si alguna condición no se cumple
}

?>
