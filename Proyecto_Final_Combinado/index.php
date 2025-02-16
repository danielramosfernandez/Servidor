

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="img/diabetes.png">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <title>Inicio de sesion</title>
</head>
<body>
    <div class="fullscreen-bg d-flex flex-column align-items-center justify-content-center vh-100"> 

        <div class="d-flex justify-content-center">
            <!-- Puse la imagen al 50% por ciento de tamaño -->
            <img class="w-25 mb-3" src="img/diabetes.png" alt="Logo diabetes">
        </div>
        <div class="col-md-6 col-lg-4 p-4 bg-light rounded shadow text-center ">
            <h1 class="text-black mb-4">Inicio De Sesión</h1> 
            <!-- Formulario de inicio de sesión -->
            <div class="row g-3 ">
                <div class="col-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" placeholder="nombre_de_usuario">
                        <label for="floatingUsername">Nombre de usuario</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating  ">
                        <input type="password" class="form-control " placeholder="contraseña">
                        <label for="floatingPassword">Contraseña</label>
                    </div>
                </div>
                <div class="col-12 ">
                    <!-- Boton de registro -->
                    <button type="submit" class="btn btn-danger " onclick="window.location.href='paginas/registro.php'">Registrarse</button>
                    <!-- Botón para iniciar sesion -->
                    <button type="submit" class="btn btn-secondary">Iniciar Sesión</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script></body>
</html> 

<?php
require_once 'bbdd/conexion.php';

//!Comprobamos que el usuario y la clave coinciden con un registro de la base de datos 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];

    $sql = "SELECT * FROM usuario WHERE nombre_de_usuario = '$usuario' AND contraseña = '$contra'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //!Si el inicio de sesion es correcto nos envia al menú
        header("Location:paginas/menu.php");
        exit;
    } else {
        //!Si hay errores en el usuario o contraseña nos lo dice
        $error_message = "Usuario o contraseña incorrectos.";
    }
}
?>