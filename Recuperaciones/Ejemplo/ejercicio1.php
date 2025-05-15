<?php
session_start();
require_once 'config.php';

if (isset($_POST['usuario'])) {
    $usu = $_POST['usuario'];
    $pass = $_POST['password'];

    $query = "SELECT Nombre, Clave FROM usuarios WHERE Nombre='$usu' AND Clave='$pass'";
    $result = $connection->query($query);

    if (!$result) {
        die("Error en la consulta: " . $connection->error);
    }

    if ($result->num_rows != 0) {
        $fila = $result->fetch_assoc();
        $_SESSION['Nombre'] = $fila['Nombre'];
        $connection->close();
        header("Location: menu.php");
        exit();
    } else {
        session_destroy();
        echo "<a href='ejercicio1.php'>Alguna de las credenciales es incorrecta.</a>";
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
    <form method="post">
        <label for="usuario">Usuario: </label>
        <input type="text" id="usuario" name="usuario" required><br>

        <label for="password">Contraseña: </label>
        <input type="password" id="password" name="password" required><br> 

        <input type="submit" value="Iniciar" name="submit">
    </form>
</body>
</html>
