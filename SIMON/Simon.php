<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Círculo en HTML</title>
    <style>
        body{ 
            text-align:center;
        }
        .circulo {
            display: inline-block;
            width: 100px;          
            height: 100px;        
            border-radius: 50%;  
            margin: 20px;    
            border: 4px solid black;      
        }
        
        
    </style>
</head>
<body>
    <?php
    
    $colores = ["#FF0000", "#00FF00", "#0000FF", "#FFFF00"]; 

    shuffle($colores);

    
    foreach ($colores as $color) {
        echo "<div class='circulo' style='background-color: $color;'></div>";
        
    }
    ?> 
    <br>
    <form action="Respuesta.php" method="POST">
    <input type="hidden" name="color" value="<?php echo $color;?>">
    <button id="enviar" type="submit">EMPEZAR A JUGAR</button>
    </form>
</body>
</html>
