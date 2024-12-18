<?php
require_once 'login.php';
// Procesar el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];

    $sql = "SELECT * FROM usuarios WHERE Nombre = '$usuario' AND Clave = '$clave'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Inicio de sesión exitoso, redirigir a inicio.php
        header("Location: Pagina_de_Inicio.php");
        exit;
    } else {
        // Credenciales inválidas, mostrar mensaje de error
        $error_message = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inicio de Sesión</title>
</head>
<body>
    <h1>Inicio de Sesión</h1>
    <?php if (isset($error_message)) { ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php } ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Usuario: <input type="text" name="usuario"><br>
        Contraseña: <input type="password" name="clave"><br>
        <input type="submit" name="submit" value="Iniciar Sesión">
    </form>
</body>
</html>