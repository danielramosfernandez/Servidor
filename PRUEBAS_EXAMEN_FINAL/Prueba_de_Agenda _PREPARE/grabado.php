<?php 
//^ Iniciamos la sesión
session_start();
require_once 'conexion.php';
$connection = new mysqli($hn, $un, $pw, $db);
if ($connection->connect_error) die("Fatal Error");
$cod = $_SESSION['cod'] ?? 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <h1>AGENDA</h1>
    <!-- Volvemos a rescatar el nombre del usuario de la sesión -->
    <h2>Hola <?php echo htmlspecialchars($_SESSION['usu'] ?? 'Usuario'); ?></h2>
    <?php
    /* Volvemos a hacer un for con la sesión y guardamos los datos de cada formulario en una variable */
    for ($i = 1; $i <= ($_SESSION['contador'] ?? 0) + 1; $i++) {
        $nombre = $_POST['nombre' . $i] ?? '';
        $email = $_POST['email' . $i] ?? '';
        $telf = $_POST['telefono' . $i] ?? '';
        
        /* Insertamos los datos con una consulta preparada */
        $query = "INSERT INTO contactos (nombre, email, telefono, codusuario) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($query);
        if ($stmt) {
            $stmt->bind_param("sssi", $nombre, $email, $telf, $cod);
            $stmt->execute();
            $stmt->close();
        } else {
            die("Error en la consulta");
        }
    }
    $connection->close();
    ?>
    
    <!-- Ponemos el contador que habíamos iniciado antes en otro archivo y le sumamos uno para saber el número total de usuarios -->
    <p>Se han grabado los <?php echo ($_SESSION['contador'] ?? 0) + 1; ?> contactos de <?php echo htmlspecialchars($_SESSION['usu'] ?? 'Usuario'); ?></p>
    <a href="index.php">Volver a loguearse</a><br>
    <a href="inicio.php">Introducir más contactos para <?php echo htmlspecialchars($_SESSION['usu'] ?? 'Usuario'); ?></a><br>
    <a href="totales.php">Total de contactos guardados</a><br>
</body>
</html>
