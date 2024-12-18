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

$numero = rand(0, 3);


function obtenerColorAleatorio() {
    $numero = rand(0, 3);
    switch ($numero) {
        case 0:
            return "red";
        case 1:
            return "green";
        case 2:
            return "blue";
        case 3:
            return "yellow";
    }
}


$color1 = obtenerColorAleatorio();
$color2 = obtenerColorAleatorio();
$color3 = obtenerColorAleatorio();
$color4 = obtenerColorAleatorio();
?>
 <div class="circulo" style="background-color: <?php echo $color1; ?>;"></div>
 <div class="circulo" style="background-color: <?php echo $color2; ?>;"></div>
 <div class="circulo" style="background-color: <?php echo $color3; ?>;"></div>
 <div class="circulo" style="background-color: <?php echo $color4; ?>;"></div>
    <br>
    <button id="enviar" type="submit">JUGAR</button>
</body>
</html>
