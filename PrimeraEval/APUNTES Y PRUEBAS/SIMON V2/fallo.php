<?php
    session_start();
    require_once 'pintar-circulos.php';
    $ur=$_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acierto</title>
</head>
<body>
    <h1>SIMON</h1>
    <h2><?php echo $ur; ?>, lo sentimos has fallado</h2>
    <h3>La combinacion era: </h3>
    <?php pintar_circulos($_SESSION['coloresValidos']);?>
    <h3>Y tu combinacion fue: </h3>
    <?php pintar_circulos($_SESSION['coloresPulsados']);?>
    <?php
        require_once 'datdb.php';
        $ctdb=new mysqli($hn,$user,$pw,$db,3307);
        if($ctdb->connect_error)die("Error connecting");
        $qryInsert="INSERT INTO jugadas (codigousu,acierto) VALUES ((SELECT Id FROM usuarios where Nombre='$ur'),0);";
        $ctdb->query($qryInsert);
        $ctdb->close();
    ?>
    <p>Se ha guardado en la base de datos</p>
    <a href="inicio.php">Volver a jugar</a>
    <a href="estadisticas.php">Estadisticas</a>
</body>
</html>