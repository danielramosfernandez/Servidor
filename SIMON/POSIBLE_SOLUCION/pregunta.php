<?php
    session_start();
    if (isset($_POST["color"])) {
        $_SESSION["color"] = $_POST["color"];
    }

    if (isset($_POST["tempColor"])) {
        $tempColor = $_POST["tempColor"];
    } else {
        $tempColor = "black";
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
            background-color: <?php echo $tempColor;?>; 
            border-radius: 50%; 
        }
    </style>
</head>
<body>
    <div class="circulo"></div>
    <form action="#" method="post">
        <input type="submit" value="red" name="tempColor">
        <input type="submit" value="green" name="tempColor">
        <input type="submit" value="blue" name="tempColor">
        <input type="submit" value="yellow" name="tempColor">
    </form>
    <form action="comprobar.php" method="post">
        <input type="hidden" name="resColor" value="<?php echo $tempColor;?>">
        <input type="submit" value="Enviar" name="submit">
    </form>
    
</body>
</html>