<?php
require_once('conexion.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $username = $_POST['usuario'];
    $password = $_POST['password'];
    $nacimiento = $_POST['nacimiento'];  


    $sql = "SELECT * FROM usuario WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username); 
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {

        echo "El nombre de usuario ya está en uso. Intenta con otro.";
    } else {

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO usuario (nombre, apellidos, usuario, contra, fecha_nacimiento) 
                  VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($query);

        $stmt->bind_param("sssss", $nombre, $apellido, $username, $passwordHash, $nacimiento);
        
        if ($stmt->execute()) {
           
            header("Location:../login.php");
        } else {
            echo "Error en el registro: " . $stmt->error;
        }
    }
    $stmt->close();
}
$conn->close();
?>
