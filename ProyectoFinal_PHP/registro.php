<?php
session_start();
require_once 'login.php';

if (isset($_POST['nombre']) && isset($_POST['psw']) && isset($_POST['apellido']) && isset($_POST['fecha_nacimiento'])) {
    $nombre = $_POST['nombre'];
    $psw = $_POST['psw'];
    $apellido = $_POST['apellido'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    // Conectar a la base de datos
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die("Fatal Error");

    // Comprobar si el nombre ya existe
    $query = "SELECT Codigo FROM usuarios WHERE Nombre = '$nombre'";
    $result = $connection->query($query);
    if (!$result) die("Fatal Error");
    
    $rows = $result->num_rows;
    if ($rows != 0) {
        echo "<a href='registro.php'>El nombre de usuario ya existe. Vuelva a intentarlo.</a>";
    } else {
        // Insertar nuevo usuario en la base de datos con los nuevos campos
        $query = "INSERT INTO usuarios (Nombre, Clave, Apellido, FechaNacimiento) VALUES ('$nombre', '$psw', '$apellido', '$fecha_nacimiento')";
        $result = $connection->query($query);
        
        if ($result) {
            echo "Registro exitoso. Ahora puedes <a href='index.php'>iniciar sesión</a>.";
        } else {
            echo "Hubo un error al registrar el usuario. Por favor, inténtalo de nuevo.";
        }
    }
    $connection->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Crear una nueva cuenta</h1>
    <form action="#" method="post">
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" required><br>
        
        <label for="apellido">Apellidos: </label>
        <input type="text" id="apellido" name="apellido" required><br>

        <label for="psw">Contraseña: </label>
        <input type="password" id="psw" name="psw" required><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento: </label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br>

        <input type="submit" value="Registrar" name="submit">
    </form>
    <a href="index.php">Ya tengo cuenta. Iniciar sesión.</a>
</body>
</html>
