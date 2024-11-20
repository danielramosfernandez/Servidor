<?php
// Iniciar sesión
session_start();

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuIngresado = $_POST['usu'];
    $passIngresado = $_POST['pass'];

    // Verificar si los datos ingresados coinciden con los datos de la sesión
    if (isset($_SESSION['usuarioRegistrado']) && isset($_SESSION['passwordRegistrado'])) {//Comprueba si existe alguien con esos datos
        if ($usuIngresado === $_SESSION['usuarioRegistrado'] && $passIngresado === $_SESSION['passwordRegistrado']) {//En el caso de que localice esa cuenta
            echo "Bienvenido, " . $_SESSION['usuarioRegistrado'] . "!<br>";
            echo "Tu rol es: " . $_SESSION['rolRegistrado'];
        } else {
            echo "Usuario o contraseña incorrectos. <a href='login.php'>Intenta nuevamente</a>";//Te equivocas de datos
        }
    } else {
        echo "No se encontró un usuario registrado. <a href='registro.php'>Regístrate primero</a>";//No existe tal cuenta
    }
}
?>

<!-- Formulario de inicio de sesión -->
<form method="POST" action="acceso.php">
    Nombre: <input type="text" name="usu" required><br><br>
    Contraseña: <input type="password" name="pass" required><br><br>
    <input type="submit" value="INICIAR SESIÓN">
</form>
