<?php
require_once 'conexion.php'; // Asegúrate de que este archivo conecta correctamente

session_start(); // Iniciar sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]); // Nombre de usuario ingresado
    $clave = trim($_POST["clave"]); // Contraseña ingresada

    // Verificar si la conexión a la BD está activa
    if (!$conn) {
        die("Error de conexión a la base de datos");
    }

    // Realizamos la consulta para obtener la información del usuario
    $sql = "SELECT * FROM usuario WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    // Si el usuario existe, verificamos la contraseña
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $passwordHashDB = $row["contra"]; // Contraseña hasheada almacenada en la BD

        // Verificar la contraseña ingresada con el hash almacenado
   /*      var_dump($clave);
var_dump($passwordHashDB);
exit; */
        if (password_verify($clave, $passwordHashDB)) {
            // Si coinciden, iniciamos la sesión
            $_SESSION["usuario"] = $usuario;
            $_SESSION["id_usu"] = $row["id_usu"]; // Guardamos el identificador del usuario

            // Redirigir al menú
            header("Location: ../paginas/menu.php");
            exit;
        } else {
            $_SESSION["error_message"] = "Usuario o contraseña incorrectos.";
            header("Location: ../login.php");
            exit;
        }
    } else {
        $_SESSION["error_message"] = "incorrectos.";
        header("Location: ../login.php");
        exit;
    }

    $stmt->close();
}
