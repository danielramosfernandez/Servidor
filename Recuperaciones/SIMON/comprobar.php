<?php
session_start();
require_once "pintar-circulos.php";
require_once "conexion.php";

if (!isset($_SESSION['usu']) || !isset($_SESSION['cod']) || !isset($_SESSION["solucion"]) || !isset($_SESSION["respuesta"])) {
    die("No se han recibido los datos necesarios.");
}

$usu = $_SESSION['usu'];
$cod = intval($_SESSION['cod']);
$connection = new mysqli($hn, $un, $pw, $db);
if ($connection->connect_error) die("Fatal Error");

$solucion = $_SESSION["solucion"];
$respuesta = $_SESSION["respuesta"];

if (count($solucion) !== count($respuesta)) {
    die("La solución y la respuesta no coinciden en número de colores.");
}

if ($solucion == $respuesta) {
    $query = "INSERT INTO jugadas (codigousu, acierto) VALUES ($cod, 1)";
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            .circulos { display: flex; }
            .circulo { width: 100px; height: 100px; border-radius: 50%; }
        </style>
    </head>
    <body>
        <h1>SIMÓN</h1>
        <h2><?php echo $usu; ?> enhorabuena, has acertado</h2>
        <div class="circulos">
            <?php pintar_circulos(...$solucion); ?>
        </div>
        <a href="index.php">Acertaste, nueva ronda</a>
        <a href="estadistica.php?usuario=<?php echo $usu; ?>">Estadística</a>
    </body>
    </html>
    <?php
} else {
    $query = "INSERT INTO jugadas (codigousu, acierto) VALUES ($cod, 0)";
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            .circulos { display: flex; }
            .circulo { width: 100px; height: 100px; border-radius: 50%; }
        </style>
    </head>
    <body>
        <h1>SIMÓN</h1>
        <h2><?php echo $usu; ?>, lo sentimos, has fallado</h2>
        <h3>LA COMBINACIÓN CORRECTA ERA:</h3>
        <div class="circulos">
            <?php pintar_circulos(...$solucion); ?>
        </div>
        <h3>TU RESPUESTA:</h3>
        <div class="circulos">
            <?php pintar_circulos(...$respuesta); ?>
        </div>
        <a href="index.php">Fallaste, nueva ronda</a>
        <a href="estadistica.php?usuario=<?php echo $usu; ?>">Estadística</a>
    </body>
    </html>
    <?php
}

$connection->query($query) or die("Fatal Error");
$connection->close();
session_destroy();
