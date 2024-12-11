<?php
    require_once 'datdb.php';
    session_start();
    $ctdb = new mysqli($hn, $user, $pw, $db,3307);
    if ($ctdb->connect_error) die("Error connecting");

    $qryUsuario = "SELECT codigo FROM usuarios WHERE Nombre='{$_SESSION['usuario']}'";
    $us = $ctdb->query($qryUsuario);
    $codigousu = $us->fetch_assoc()['codigo'];

    for ($i = 1; $i <= $_SESSION['cont']; $i++) {
        // Sanitize and quote string values
        $nombre = $ctdb->real_escape_string($_POST['nombre'.$i]);
        $email = $ctdb->real_escape_string($_POST['email'.$i]);
        $telefono = $ctdb->real_escape_string($_POST['telefono'.$i]);

        // Correct the query with single quotes around string values
        $qryInsert = "INSERT INTO contactos (nombre, email, telefono, codusuario) 
                      VALUES ('$nombre', '$email', '$telefono', $codigousu)";
        
        if (!$ctdb->query($qryInsert)) {
            die("Error executing query: " . $ctdb->error);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <h1>Hola <?php echo $_SESSION['usuario']?></h1>    
    <p>Se han grabado <?php echo $_SESSION['cont']?> contactos de <?php echo $_SESSION['usuario']?></p>
    <a href="index.php">Volver a logearse</a>
    <a href="inicio.php">introducir mas contactos para <?php echo $_SESSION['usuario']?></a>
    <a href="totales.php">Total de contactos guardados</a>
</body>
</html>