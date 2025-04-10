<?php
session_start();
require_once 'conexion.php';

if (isset($_POST['usu'])) {
    $usu = $_POST['usu'];
    $contra = $_POST['psw'];

    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die("Error de conexión a la base de datos.");

    $query = "SELECT Codigo, Nombre, Clave, Rol FROM usuarios WHERE Nombre='$usu' AND Clave='$contra'";
    $result = $connection->query($query);
    if (!$result) die("Error en la consulta.");

    if ($result->num_rows != 0) {
        $fila = $result->fetch_assoc();
        $_SESSION['usu'] = $fila['Nombre'];
        $_SESSION['cod'] = $fila['Codigo'];
        $_SESSION['rol'] = (int)$fila['Rol'];

        $connection->close();

        if ($_SESSION['rol'] === 1) {
            header("Location: menu-dificultad.php");
            exit();
        } elseif ($_SESSION['rol'] === 0) {
            header("Location: jugar.php");
            exit();
        } else {
            echo "ROL DESCONOCIDO: " . $_SESSION['rol'];
            exit();
        }
    } else {
        session_destroy();
        echo "<a href='index.php'>Usuario y/o contraseña incorrectos. Volver a intentar.</a>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMÓN - Iniciar Sesión</title>
</head>
<body>
    <h1>JUGAR AL SIMÓN</h1>
    <form action="#" method="post">
        <label for="usu">Usuario: </label>
        <input type="text" id="usu" name="usu" required><br>

        <label for="psw">Contraseña: </label>
        <input type="password" id="psw" name="psw" required><br> 

        <input type="submit" value="Iniciar" name="submit">
    </form>
</body>
</html>
