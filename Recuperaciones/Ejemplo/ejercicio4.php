<?php
// ejercicio4.php
require 'config.php';
if (!isset($_SESSION['usuario'])) {
    header("Location: ejercicio1.php");
    exit();
}

// Consultas para estadísticas
$totalPeliculas = 0;
$alquiladas = 0;
$noAlquiladas = 0;

// Total de películas
$query = "SELECT COUNT(*) as total FROM pelicula";
$result = mysqli_query($conn, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $totalPeliculas = $row['total'];
}

// Películas alquiladas
$query = "SELECT COUNT(*) as alquiladas FROM pelicula WHERE alquilada = 1";
$result = mysqli_query($conn, $query);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $alquiladas = $row['alquiladas'];
}

// No alquiladas y porcentajes
$noAlquiladas = $totalPeliculas - $alquiladas;
$porcentajeAlquiladas = $totalPeliculas > 0 ? ($alquiladas / $totalPeliculas) * 100 : 0;
$porcentajeNoAlquiladas = $totalPeliculas > 0 ? ($noAlquiladas / $totalPeliculas) * 100 : 0;

// Películas por año
$query = "SELECT anio, COUNT(*) as cantidad FROM pelicula GROUP BY anio ORDER BY anio";
$result = mysqli_query($conn, $query);
$peliculasPorAnio = [];
while ($row = mysqli_fetch_assoc($result)) {
    $peliculasPorAnio[] = $row;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Estadísticas - Videoclub</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 800px; margin: 0 auto; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .barra { 
            height: 20px; background: #f0f0f0; margin: 5px 0; 
            position: relative; border-radius: 3px;
        }
        .barra-alquiladas { 
            display: block; height: 100%; background: #4CAF50; border-radius: 3px;
            width: <?php echo $porcentajeAlquiladas; ?>%;
        }
        .barra-no-alquiladas { 
            display: block; height: 100%; background: #f44336; border-radius: 3px;
            width: <?php echo $porcentajeNoAlquiladas; ?>%;
        }
        .grafico-anio { margin: 30px 0; }
        .barra-anio { 
            height: 20px; background: #e0e0e0; margin: 5px 0; 
            position: relative; border-radius: 3px;
        }
        .barra-anio span {
            display: block; height: 100%; background: #2196F3; border-radius: 3px;
        }
        .etiqueta { display: inline-block; width: 100px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Resultados Estadísticos</h2>
        <a href="menu.php">Volver al menú</a>        
        <h3>Totales y Porcentajes</h3>
        <table>
            <tr>
                <th>Total de películas</th>
                <th>Alquiladas</th>
                <th>No alquiladas</th>
            </tr>
            <tr>
                <td><?php echo $totalPeliculas; ?></td>
                <td><?php echo $alquiladas; ?></td>
                <td><?php echo $noAlquiladas; ?></td>
            </tr>
            <tr>
                <td>100%</td>
                <td><?php echo number_format($porcentajeAlquiladas, 2); ?>%</td>
                <td><?php echo number_format($porcentajeNoAlquiladas, 2); ?>%</td>
            </tr>
        </table>        
        <div class="barra">
            <span class="barra-alquiladas" title="Alquiladas: <?php echo number_format($porcentajeAlquiladas, 2); ?>%"></span>
            <span class="barra-no-alquiladas" title="No alquiladas: <?php echo number_format($porcentajeNoAlquiladas, 2); ?>%"></span>
        </div>        
        <h3>Películas por año</h3>
        <div class="grafico-anio">
            <?php foreach ($peliculasPorAnio as $item): ?>
                <div>
                    <span class="etiqueta"><?php echo $item['anio']; ?>:</span>
                    <div class="barra-anio">
                        <span style="width: <?php echo ($item['cantidad'] / max(1, $totalPeliculas) * 100); ?>%;">
                            <?php echo $item['cantidad']; ?>
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>	
</body>
</html>
