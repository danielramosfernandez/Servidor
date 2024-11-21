<?php
session_start();
//De nuevo hay que utilizar sesiones para mantener la posibilidad de repetir las operaciones
// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usu = $_POST['usu'];
    $pass = $_POST['pass'];

    // Verificar si el usuario existe
    if (isset($_SESSION['usuarios'][$usu])) {
        // Validar contraseña
        if ($_SESSION['usuarios'][$usu]['password'] === $pass) {
            echo "Bienvenido, $usu!<br>";
            echo "Tu rol es: " . $_SESSION['usuarios'][$usu]['rol'] . "<br>";
        } else {
            echo "Error: Contraseña incorrecta. <a href='acceso.php'>Intenta nuevamente</a>";
        }
    } else {
        echo "Error: Usuario no registrado. <a href='registro.php'>Regístrate primero</a>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acceso</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form method="POST" action="acceso.php">
        Nombre: <input type="text" name="usu" required><br><br>
        Contraseña: <input type="password" name="pass" required><br><br>
        <input type="submit" value="INICIAR SESIÓN">
    </form>
</body>
</html>
