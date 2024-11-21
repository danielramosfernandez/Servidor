<?php
session_start();
//Para poder tener que repetir operaciones, hay que utilizar sesiones
// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usu = $_POST['usu'];
    $pass = $_POST['pass'];
    $conf = $_POST['conf'];
    $rol = isset($_POST['rol']) ? $_POST['rol'] : 'estandar';

    // Validar si las contraseñas coinciden
    if ($pass === $conf) {
        // Verificar si ya hay un usuario registrado con ese nombre
        if (isset($_SESSION['usuarios'][$usu])) {
            echo "Error: Ya existe un usuario con ese nombre. Elige otro.<br>";
            echo '<a href="registro.php">Volver al registro</a>';
        } else {
            // Guardar el usuario en la sesión (simulación de base de datos)
            $_SESSION['usuarios'][$usu] = [
                'password' => $pass,
                'rol' => $rol,
            ];
            echo "Registro exitoso. Bienvenido, $usu. Tu rol es: $rol.<br>";
            echo '<a href="acceso.php">Ir al inicio de sesión</a>';
        }
    } else {
        echo "Error: Las contraseñas no coinciden. Por favor, vuelve a intentarlo.<br>";
        echo '<a href="registro.php">Volver al registro</a>';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
    <h2>Registro</h2>
    <form method="POST" action="registro.php">
        Nombre: <input type="text" name="usu" required><br><br>
        Contraseña: <input type="password" name="pass" required><br><br>
        Confirmar contraseña: <input type="password" name="conf" required><br><br>
        Rol:<br>
        Estandar <input type="radio" name="rol" value="estandar" checked><br>
        Premium <input type="radio" name="rol" value="premium"><br><br>
        <input type="submit" value="REGISTRARSE">
    </form>
</body>
</html>
