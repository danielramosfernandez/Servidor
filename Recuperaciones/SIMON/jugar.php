<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARCHIVO JUGAR</title>
    <style> 
        .circulos{ 
            display: flex; 
        }
        .circulo{ 
            width: 100px; 
            height: 100px; 
            border-radius:50%; 
        }
    </style>
</head>
<body>
    <h1>JUGAR A SIMON</h1>
    <h2>Bienvenido <?php echo $_SESSION['usu']; ?></h2><br>
    <h3>Memorice esta conbinación</h3>
    <div class="circulos">
        <?php $_SESSION["solucion"] = pintar_circulos(color(),color(),color(),color());?>
    </div> 
    <br>
    <form action="pregunta.php" method="post">
        <input type="submit" value="Jugar" name="submit">
    </form>
</body>
</html>