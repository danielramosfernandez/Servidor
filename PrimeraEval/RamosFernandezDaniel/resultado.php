<?php

    require_once 'login.php';
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die("Fatal Error");
    $query = "SELECT nombre,puntos FROM jugador ";
    $result = $connection->query($query);
    if (!$result) die("Fatal Error");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadistica</title>
    <style>
        table {
            border: 1px solid black;
            
            
            text-align: left;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        .bar {
            background-color: blue;
            height: 20px;
        }
    </style>
</head>
<body>
    <h1>PUNTOS POR JUGADOR</h1>

    <table>
        <tr>
            <th>login</th>
            <th>Puntos</th>
    
            <th>Gráfica</th>
        </tr>
        <?php 
          $query = "SELECT nombre FROM jugador";
            $rows = $result->num_rows;
            for ($j = 0 ; $j < $rows ; ++$j)
                {
                    echo "<tr>";
                    $result->data_seek($j);
                    echo '<td>' .htmlspecialchars($result->fetch_assoc()['nombre']) .'</td>'; 
                    $result->data_seek($j);
                    echo '<td>' .htmlspecialchars($result->fetch_assoc()['puntos']) .'</td>';
                    $result->data_seek($j);
                    echo "<td><div class='bar' style='width: " . (htmlspecialchars($result->fetch_assoc()['puntos']) * 10) . "px;'></div>"
                    .'</td></tr>';
                
                }
        ?>
    </table>
    <a href="index.php">VOLVER AL INICIO</a>
</body>
</html>
<?php

    $connection->close();
?>