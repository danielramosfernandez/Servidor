<?php
// menu.php
require_once 'config.php';
if (!isset($_SESSION['Nombre'])) {
    header("Location: ejercicio1.php");
    exit();
} ?>
<!DOCTYPE html>
<html>
<head>
    <title>Menú - Videoclub</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .menu { max-width: 500px; margin: 0 auto; text-align: center; }
        .opcion { margin: 15px; padding: 10px; background: #f0f0f0; border-radius: 5px; }
        .opcion a { text-decoration: none; color: #333; font-weight: bold; }
    </style>
</head>
<body>
    <div class="menu">
<h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['Nombre']); ?></h2>

        <h3>Menú Principal</h3>        
        <div class="opcion">
            <a href="ejercicio2.php">Insertar Película</a>
        </div>        
        <div class="opcion">
            <a href="ejercicio3.php">Películas ordenadas por año</a>
        </div>
                <div class="opcion">
            <a href="ejercicio4.php">Resultados estadísticos</a>
        </div>        
        <div style="margin-top: 20px;">
            <a href="logout.php">Cerrar sesión</a>
        </div>
    </div>
</body>
</html>
