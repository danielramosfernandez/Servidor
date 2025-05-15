<?php
// ejercicio3.php
require 'config.php';
if (!isset($_SESSION['usuario'])) {
    header("Location: ejercicio1.php");
    exit();
}

// Obtener todas las películas ordenadas por año
$query = "SELECT * FROM pelicula ORDER BY anio ASC";
$result = mysqli_query($conn, $query);
$peliculas = [];
$masAntigua = null;
$masNueva = null;

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $peliculas[] = $row;
    }
    // La primera es la más antigua (orden ASC), la última la más nueva
    $masAntigua = $peliculas[0];
    $masNueva = end($peliculas);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Películas por Año - Videoclub</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 800px; margin: 0 auto; }
        .pelicula { border: 1px solid #ddd; padding: 15px; margin-bottom: 10px; border-radius: 5px; }
        .antigua { background-color: #ffe6e6; border-left: 5px solid red; }
        .nueva { background-color: #e6ffe6; border-left: 5px solid green; }
        .barra-anio { 
            height: 20px; background: #f0f0f0; margin: 5px 0; 
            position: relative; border-radius: 3px;
        }
        .barra-anio span {
            display: block; height: 100%; background: #4CAF50; border-radius: 3px;
            position: relative;
        }
        .barra-anio span::after {
            content: attr(data-anio); position: absolute; right: -25px; top: -2px;
            font-size: 12px;
        }
        h3 { margin-bottom: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Películas ordenadas por año</h2>
        <a href="menu.php">Volver al menú</a>        
        <?php if (!empty($peliculas)): ?>
            <h3>Película más antigua: <?php echo htmlspecialchars($masAntigua['titulo']); ?> (<?php echo $masAntigua['anio']; ?>)</h3>
            <h3>Película más nueva: <?php echo htmlspecialchars($masNueva['titulo']); ?> (<?php echo $masNueva['anio']; ?>)</h3>            
            <h3>Lista completa:</h3>
            <?php foreach ($peliculas as $pelicula): ?>
                <div class="pelicula <?php 
                    echo $pelicula['id'] == $masAntigua['id'] ? 'antigua' : 
                         ($pelicula['id'] == $masNueva['id'] ? 'nueva' : ''); 
                ?>">
                    <h4><?php echo htmlspecialchars($pelicula['titulo']); ?> (<?php echo $pelicula['anio']; ?>)</h4>
                    <p>Director: <?php echo htmlspecialchars($pelicula['director']); ?></p>
                    
                    <div class="barra-anio">
                        <span style="width: <?php echo ((($pelicula['anio'] - 1970) / 50) * 100); ?>%;" 
                              data-anio="<?php echo $pelicula['anio']; ?>"></span>
                    </div>                    
                    <p><?php echo htmlspecialchars($pelicula['sinopsis']); ?></p>
                    <p>Alquilada: <?php echo $pelicula['alquilada'] ? 'Sí' : 'No'; ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay películas en la base de datos.</p>
        <?php endif; ?>
    </div>
</body>
</html>
