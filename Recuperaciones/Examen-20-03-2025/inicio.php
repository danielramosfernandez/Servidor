<?php
session_start();
require_once 'conexion.php';

if (isset($_POST['usuario'])) {
    $usu = $_POST['usuario'];
    $pass = $_POST['password'];

    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die("Error de conexión a la base de datos.");

    $query = "SELECT id, usuario, password, rol FROM usuarios WHERE usuario='$usu' AND password='$pass'";
    $result = $connection->query($query);
    if (!$result) die("Error en la consulta.");

    if ($result->num_rows != 0) {
        $fila = $result->fetch_assoc();
      // login.php (ejemplo)
        $_SESSION['id'] = $fila['id'];
        $_SESSION['usu'] = $fila['usuario'];
        $_SESSION['rol'] = $fila['rol'];

        $connection->close();

        if ($_SESSION['rol'] === "alumno") {
            header("Location: menu-alumno.php");
            exit();
        } elseif ($_SESSION['rol'] === "director") {
            header("Location: menu-director.php");
            exit();
        } else {
            echo "ROL DESCONOCIDO: " . $_SESSION['rol'];
            exit();
        }
    } else {
        session_destroy();
        echo "<a href='index.php'>Alguna de las credenciales es incorrecta.</a>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
</head>
<body>
    <h1>Inicio de sesion</h1>
    <form action="#" method="post">
        <label for="usuario">Usuario: </label>
        <input type="text" id="usuario" name="usuario" required><br>

        <label for="psw">Contraseña: </label>
        <input type="password" id="password" name="password" required><br> 

        <input type="submit" value="Iniciar" name="submit">
    </form>
</body>
</html>
