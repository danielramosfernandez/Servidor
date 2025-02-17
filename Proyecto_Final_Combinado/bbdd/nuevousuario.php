<?php
require_once('conexion.php');

//*Recogemos datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $username = $_POST['usuario'];
    $password = $_POST['password'];
    $nacimiento = $_POST['nacimiento'];  

    //*Comprobacion de que el usuario ya existe
    $sql = "SELECT * FROM usuario WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username); 
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        //*En caso de que ya existyiese el usuario introducido
        //*nos lo dirá
        echo "El nombre de usuario ya está en uso. Intenta con otro.";
    } else {
        //*Este hash se encarga de encriptar la contraseña
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        //*Aqui insertamos los datos del usuario en la base de datos
        $query = "INSERT INTO usuario (nombre, apellidos, usuario, contra, fecha_nacimiento) 
                  VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($query);
        //*Las "eses" cumplen la funcion de decir que los datos son strings
        //*Excepto para la fecha que hace que sea una date
        $stmt->bind_param("sssss", $nombre, $apellido, $username, $passwordHash, $nacimiento);
        
        if ($stmt->execute()) {
            //*Una vez le demos al boton registrase nos enviará de vuelta al inicio de sesion 
            header("Location:../login.php");
        } else {
            echo "Error en el registro: " . $stmt->error;
        }
    }
    $stmt->close();
}
$conn->close();
?>
