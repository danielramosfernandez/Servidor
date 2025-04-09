<?php
    
    session_start();
    require_once "pintar-circulos.php";
    require_once "conexion.php";

    // Asegurarse de que la sesión contiene los datos necesarios
    if (!isset($_SESSION['usu']) || !isset($_SESSION['cod']) || !isset($_SESSION["solucion"]) || !isset($_SESSION["respuesta"])) {
        die("No se han recibido los datos necesarios.");
    }

    $usu = $_SESSION['usu'];
    $cod = intval($_SESSION['cod']);
    
    $connection = new mysqli($hn, $un, $pw, $db);
    if ($connection->connect_error) die("Fatal Error");

?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .circulos {
            display: flex;
        }
        .circulo {
            width: 100px;       
            height: 100px;      
            border-radius: 50%; 
        }
    </style>
</head>
<?php

    // Asegurarse de que las respuestas y la solución son arrays y tienen los índices correctos
    if (isset($_SESSION["solucion"]) && isset($_SESSION["respuesta"])) {
        $solucion = $_SESSION["solucion"];
        $respuesta = $_SESSION["respuesta"];

        // Verificar si las longitudes de las soluciones y respuestas coinciden
        if (count($solucion) !== count($respuesta)) {
            die("La solución y la respuesta no coinciden en número de colores.");
        }
    } else {
        die("No se ha recibido la solución o respuesta.");
    }

    // Comprobamos si la respuesta del usuario es correcta
    if ($solucion == $respuesta) {
        $query = "INSERT INTO jugadas (codigousu, acierto) VALUES ($cod, 1)";
        ?>
        <body>
            <?php
            echo "<pre>";
            var_dump($respuesta, $solucion); // Ver las respuestas y la solución
            echo "</pre>";
            ?>
            <h1>SIMÓN</h1>
            <h2><?php echo $_SESSION['usu']; ?> enhorabuena, has acertado</h2>
            <div class="circulos">
                <?php 
                // Pintamos los círculos de la solución
                pintar_circulos(...$solucion);
                ?>
            </div>
            <a href="index.php">Acertaste, nueva ronda</a>
            <a href="estadistica.php?usuario=<?php echo $_SESSION['usu']; ?>">Estadística</a>
        </body>
        </html>
        <?php
    } else {
        $query = "INSERT INTO jugadas (codigousu, acierto) VALUES ($cod, 0)";
        ?>
        <body>
            <h1>SIMÓN</h1>
            <h2><?php echo $_SESSION['usu']; ?>, lo sentimos, has fallado</h2>
            <h3>LA COMBINACIÓN CORRECTA ERA:</h3>
            <div class="circulos">
                <?php 
                // Pintamos los círculos de la solución correcta
                pintar_circulos(...$solucion);
                ?>
            </div>
            <h3>TU RESPUESTA:</h3>
            <div class="circulos">
                <?php 
                // Pintamos los círculos de la respuesta del usuario
                pintar_circulos(...$respuesta);
                ?>
            </div>
            <a href="index.php">Fallaste, nueva ronda</a>
            <a href="estadistica.php?usuario=<?php echo $_SESSION['usu']; ?>">Estadística</a>
        </body>
        </html>
        <?php
    }

    $result = $connection->query($query);
    if (!$result) die("Fatal Error");
    $connection->close();
    session_destroy();
?>
