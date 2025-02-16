<?php 
session_start(); 
require_once 'login.php';
$conn = new mysqli($hn, $un, $pw, $db, 3307);
if ($conn->connect_error) die("Fatal Error: " . $conn->connect_error);

if (isset($_POST['sol']) ) {
    $usu = $_SESSION['usu']; 
    $fech= '2024-12-12'; 
    $hor = '13:28';
    $sol =$_POST['sol'];
    $query = "INSERT INTO respuestas (fecha,login,hora,respuesta) VALUES ('$fech','$usu','$hor','$sol')";
            $result = $conn->query($query);
            if (!$result) die("Fatal Error");
}


?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head> 
<body>
    <h1>Bienvenid@, <?php echo $_SESSION["nom"] ?>!</h1>
    <form action="#" method="post">
    <img src='imagen/20241212.jpg' alt='Carta' width='500' height='450'> 
    <br>
    Solución al jeroglifico:<input type="TEXT" name="sol">
        <br><br>
        <input type="submit" value="Enviar" name="lev">
    </form>
    <a href="puntos.php">Ver puntos a jugador</a> 
    <br>
    <a href="resultado.php">Resultados del día</a>

</body>
</html>