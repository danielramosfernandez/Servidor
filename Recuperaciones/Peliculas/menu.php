<?php
require 'conexion.php';
session_start();
if(isset($_POST['inserta'])){
    header('Location: inserta.php');
}
if(isset($_POST['ordena'])){
    header('Location: ordena.php');
}
if(isset($_POST['stats'])){
    header('Location: stats.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Menu</h1>
    <form action="" method="post">
        <button type="submit"name='inserta'>Insertar Pelicula</button> <br>
        <button type="submit"name='ordena'>Peliculas ordenadas por año</button> <br>
        <button type="submit" name='stats'>Resultados estadísticas</button>
    </form>
</body>
</html>