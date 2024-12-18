<?php

    require_once 'login.php';
    $connection = new mysqli($hn, $un, $pw, $db,3307);
    if ($connection->connect_error) die("Fatal Error");
    $query = "SELECT fecha,login,hora,respuesta FROM respuestas "; 
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
    <h1>fecha: $fecha</h1>
        <h1>Jugadores acertantes</h1>
    <table>
        <tr>
            <th>login</th>
            <th>hora</th>
    
        </tr>
        <?php 
       
            $rows = $result->num_rows;
            for ($j = 0 ; $j < $rows ; ++$j)
                { 
                    echo "<tr>";
                    $result->data_seek($j);
                    echo '<td>' .htmlspecialchars($result->fetch_assoc()['login']) .'</td>'; 
                    $result->data_seek($j);
                    echo '<td>' .htmlspecialchars($result->fetch_assoc()['hora']) .'</td>';
                
                }
        
            
            
        ?>
    </table>

        <h1>Jugadores que han fallado</h1>
    
    </table>
    <a href="index.php">VOLVER AL INICIO</a>
</body>
</html>
<?php

    $connection->close();
?>