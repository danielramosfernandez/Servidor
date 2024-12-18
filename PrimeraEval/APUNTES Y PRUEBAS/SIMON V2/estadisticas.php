<?php
    session_start();
    require_once 'datdb.php';
    $ctdb=new mysqli($hn,$user,$pw,$db,3307);
    if($ctdb->connect_error) die("Error connecting");
    $qryStats="SELECT Id, Nombre, count(acierto) from usuarios,jugadas where (Id=codigousu and acierto=1) group by Id,Nombre";
    $resultStats=$ctdb->query($qryStats);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadisticas</title>
</head>
<body>
    <h1>SIMON</h1>
    <h2><?php echo $_SESSION['usuario'];?>, los resultados son: </h2>
    <table>
        <tr>
            <th>Código usuario</th>
            <th>Nombre</th>
            <th>Número de aciertos</th>
            <th>Gráfica</th>
        </tr>
        <?php
            $rows=$resultStats->num_rows;
            for($i=0;$i<$rows;$i++){
                $resultStats->data_seek($i);
                $row=$resultStats->fetch_assoc();
                $rect=$row['count(acierto)'];
                echo "<tr>";
                echo "<td>{$row['Codigo']}</td>";
                echo "<td>{$row['Nombre']}</td>";
                echo "<td>{$row['count(acierto)']}</td>";
                echo "<td><div style='width:{$rect}px; height:10px;background-color:blue;'></div></td>";
            }
       ?>
    </table>
    <a href="inicio.php">Jugar</a>
</body>
</html>