<?php
session_start(); 
require_once 'login.php';

// Verificar si se ha seleccionado algún contacto
if (!isset($_SESSION['contador']) || $_SESSION['contador'] == 0) { 
    echo '<p><a href="index.php">No se han grabado los contactos. Vuelva a intentarlo.</a></p>';
    exit; 
}

// Obtener el nombre de usuario y contador
$nombre_usuario = $_SESSION['nombre_usuario']; 
$contador = $_SESSION['contador'] ?? 0; 

// Cerrar sesión al redirigir
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación - Agenda</title>
</head>
<body>
    <h1>AGENDA</h1>
    <h2>Hola <?php echo htmlspecialchars($nombre_usuario); ?></h2>
    <p>Se han grabado los <?php echo $contador; ?> contacto(s) de <?php echo htmlspecialchars($nombre_usuario); ?>.</p>
    
    <ul>
        <!-- Opción para volver al logueo después de destruir la sesión -->
        <li><a href="index.php">Volver al loguearse</a>/li>

        <!-- Opción para introducir más contactos -->
        <li><a href="index.php">Introducir más contactos para <?php echo htmlspecialchars($nombre_usuario); ?></a></li>

        <!-- Opción para ver el total de contactos guardados -->
        <li><a href="totales.php">Total de contactos guardados</a></li>
    </ul>
</body>
</html>
