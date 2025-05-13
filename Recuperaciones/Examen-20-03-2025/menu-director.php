<?php 
session_start();
//&Validacion para comprobar si el usuario no tiene rol o no es director
//&Si se cumplen esas condiciones se enviará al usuario al inicio
if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== "director") { 
    header("Location: inicio.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu de director</title>
</head>
<body>
    <h1>Bienvenid@ <?php echo $_SESSION['usu']; ?></h1>
        <br>
    <p>Tu rol es: <?php echo $_SESSION['rol']; ?></p>
        <br>
    <button onclick="window.location.href='insertar.php'">Insertar notas</button>
        <br>
     <button onclick="window.location.href='insertar-punto.php'">Insercion en grupos</button>
        <br>
    <button onclick="window.location.href='mostrar-notas.php'">Mostrar notas de todos los alumnos</button>
        <br>
    <button onclick="window.location.href='borrar-notas.php'">Borrado de notas</button>
        <br>
    <button onclick="window.location.href='cierre.php'">Cerrar sesion</button>
    
</body>
</html>
