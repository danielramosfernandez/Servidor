<?php 
 $nColor = rand(0,3);

 switch ($nColor) {
    case 0:
        $color = "red";
    break;
    case 1:
        $color = "yellow";
    break;
    case 2:
        $color = "blue";
    break;
    case 3:
        $color = "green";
    break;
 }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .circulo {
            width: 100px;       
            height: 100px;      
            background-color: <?php echo $color;?>; 
            border-radius: 50%; 
        }
    </style>
</head>
<body>
    <div class="circulo">

    </div>
    <br>
    <form action="pregunta.php" method="post">
        <input type="hidden" name="color" value="<?php echo $color;?>">
        <input type="submit" value="Jugar" name="submit">
    </form>
    
</body>
</html>