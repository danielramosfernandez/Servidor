<?php
require 'conexion.php';
session_start();

$peli_nueva = $conn -> prepare('SELECT titulo,anio FROM pelicula where anio = (SELECT  MAX(anio) FROM pelicula)');
$peli_nueva -> execute();

$resultado_nueva = $peli_nueva -> get_result();
$fila_nueva = $resultado_nueva -> fetch_assoc();

$peli_antigua = $conn -> prepare('SELECT titulo,anio FROM pelicula WHERE anio = (SELECT MIN(anio) FROM pelicula)');
$peli_antigua ->execute();

$resultado_antigua = $peli_antigua -> get_result();
$fila_antigua = $resultado_antigua -> fetch_assoc();



$peliculas = $conn -> prepare('SELECT titulo , anio FROM pelicula');
$peliculas -> execute();

$r_pelis = $peliculas -> get_result();
//? selecciona todas las peliculas 
$lista_peliculas = $r_pelis->fetch_all(MYSQLI_ASSOC);

$anio_min = intval($fila_antigua['anio']);
$anio_max = intval($fila_nueva['anio']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .barra-container {
            /*background-color: #ddd;*/
            width: 30%;
            height: 20px;
            margin-bottom: 10px;
        }
        .barra {
            background-color: #3498db;
            height: 100%;
        }
    </style>
</head>
<body>
    <p>La pelicula mas nueva es -> <?php echo htmlspecialchars($fila_nueva['titulo']) ?></p>
    <p>La pelicula mas antigua es -> <?php echo htmlspecialchars($fila_antigua['titulo']) ?></p>

    <?php foreach ($lista_peliculas as $pelicula): 
        $porcentaje = 0;
        if ($anio_max != $anio_min) {
            $porcentaje = (($pelicula['anio'] - $anio_min) / 50) * 100;
        }
    ?>
        <p><?= htmlspecialchars($pelicula['titulo']) ?> (<?= $pelicula['anio'] ?>)</p>
        <div class="barra-container">
            <div class="barra" style="width: <?= $porcentaje ?>%;"></div>
        </div>
    <?php endforeach; ?>
</body>
</html>