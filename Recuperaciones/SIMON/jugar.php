<?php
session_start();
require_once "pintar-circulos.php";

if (isset($_POST['usu'])) {
    $_SESSION['usu'] = $_POST['usu'];
}
if (isset($_POST['cod'])) {
    $_SESSION['cod'] = $_POST['cod'];
}
if (isset($_POST['nivel'])) {
    $_SESSION['nivel'] = $_POST['nivel'];
}

function color() {
    $nColor = rand(0, 3);
    switch ($nColor) {
        case 0: return "red";
        case 1: return "yellow";
        case 2: return "blue";
        case 3: return "green";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JUGAR A SIMON</title>
    <style> 
        .circulos { display: flex; }
        .circulo { 
            width: 100px; 
            height: 100px; 
            border-radius: 50%; 
            margin: 5px;
        }
    </style>
</head>
<body>
    <h1>JUGAR A SIMÓN</h1>
    <h2>Bienvenido <?php echo isset($_SESSION['usu']) ? htmlspecialchars($_SESSION['usu']) : 'Invitado'; ?></h2><br>
    <h3>Memoriza esta combinación</h3>

    <div class="circulos">
        <?php 
        $nivel = isset($_SESSION['nivel']) ? $_SESSION['nivel'] : 4;
        $colores = [];
        for ($i = 0; $i < $nivel; $i++) {
            $colores[] = color();
        }
        $_SESSION["solucion"] = $colores;
        pintar_circulos(...$colores);
        ?>
    </div>

    <br>
    <form action="pregunta.php" method="post">
        <input type="submit" value="Jugar" name="submit">
    </form>
</body>
</html>
