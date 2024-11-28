<?php
// Iniciar la sesión al inicio de cada archivo PHP donde se manejan las sesiones
session_start();

// Variables globales inicializadas
$usuarioRegistrado = null;//El usuario está vacio
$passwordRegistrado = null;//La contraseña esta vacía
$rolRegistrado = null;//El rol está vacío

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger datos del formulario
    $usu = $_POST['usu'];
    $pass = $_POST['pass'];
    $conf = $_POST['conf'];
    $rol = isset($_POST['rol']) ? $_POST['rol'] : 'estandar';

    // Validar que las contraseñas coincidan
    if ($pass === $conf) {
        // Guardar datos del usuario en la sesión
        $_SESSION['usuarioRegistrado'] = $usu;
        $_SESSION['passwordRegistrado'] = $pass;
        $_SESSION['rolRegistrado'] = $rol;

        // Mensaje de éxito
        echo "Registro exitoso. Bienvenido, $usu. Tu rol es: $rol.<br>";
        echo '<a href="acceso.php">Ir al inicio de sesión</a>';
    } else {
        // Error si las contraseñas no coinciden
        echo "Error: Las contraseñas no coinciden. Por favor, vuelve a intentarlo.<br>";
        echo '<a href="registro.php">Volver al registro</a>';
    }
}
?>
