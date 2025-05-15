<?php
require 'conexion.php';
session_start();

$total = $conn -> prepare('SELECT COUNT(titulo) AS totales FROM pelicula ');
$total ->execute();

$resultado_total = $total -> get_result();
$fila_total = $resultado_total -> fetch_assoc();

$alquiladas = $conn -> prepare('SELECT COUNT(titulo) AS alquiladas FROM pelicula WHERE alquilada = 1');
$alquiladas -> execute();

$r_alq = $alquiladas -> get_result();
$f_alq = $r_alq -> fetch_assoc();


$no_alq = $conn -> prepare('SELECT COUNT(titulo) AS noalquiladas FROM pelicula WHERE alquilada = 0');
$no_alq->execute();

$r_nalq = $no_alq -> get_result();
$f_nalq = $r_nalq -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td></td>
                <td>Total de peliculas</td>
                <td>Alquiladas</td>
                <td>No alquiladas</td>
            </tr>
            <tr>
                <td>Valor</td>
                <td> <?php echo intval($fila_total['totales']); ?> </td>
                <td> <?php echo intval($f_alq['alquiladas']);?> </td>
                <td> <?php echo intval($f_nalq['noalquiladas']);?> </td>
            </tr>
            <tr>
                <td>Porcentaje</td>
                <td></td>
                <td> <?php $alquiporce = round(intval($f_alq['alquiladas'])/intval($fila_total['totales'])*100,2); echo $alquiporce . '%'?> </td>
                <td> <?php $noalquiporce = round(intval($f_nalq['noalquiladas'])/intval($fila_total['totales'])*100,2); echo $noalquiporce . '%'?></td>
            </tr>
        </thead>
    </table>
</body>
</html>