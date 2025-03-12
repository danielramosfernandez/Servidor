<?php
require_once 'conexion.php'; 

session_start(); 

//^Comprobamos que el formulario fue rellenado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]); 
    $clave = trim($_POST["clave"]);

  //^Se comprueba la conexión con la base de datos
    if (!$conn) {
        die("Error de conexión a la base de datos");
    }

    //^Se hace una Select para revisar los usuarios existentes en la 
    //^base de datos
    $sql = "SELECT * FROM usuario WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    //^Si dentro de la base existe el usuario introducido se iniciara 
    //^El proceso de inicio de sesión 
    //^Sino saltará error
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $passwordHashDB = $row["contra"]; //&Almacenamos la contraseña en un Hash

        if (password_verify($clave, $passwordHashDB)) {
            //^Se compara la contraseña introducida en el inicio con la del hash del registro 
            //^De nuevo en caso de no funcionar serás reenviado al menú (de momento)
            $_SESSION["usuario"] = $usuario;
            $_SESSION["id_usu"] = $row["id_usu"]; //&Vamos a guardar el usuario que será importante pará después
            $_SESSION["nombre"] = $row["nombre"];

            //&Aqui vemos la dirección que se seguira en caso de estar todo correcto
            header("Location: ../paginas/menu.php");
            exit;
        } else {
            //&Este es el código que lleva al error de usuarios y contraseñas
            $_SESSION["error_message"] = "Usuario o contraseña incorrectos.";
            header("Location: ../index.php");
            exit;
        }
    } else {
        $_SESSION["error_message"] = "Usuario no existente.";
        header("Location: ../index.php");
        exit;
    }

    $stmt->close();
}