<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con 9 cajas de texto</title>
</head>
<body>

  
  
    <form action="PruebaFormularioB.php" method="get">
        <?php
        for($i=0; $i<3; $i++){ 
            echo "<label for='caja$i'>Caja de texto $i:</label><br>";
            echo "<input type='text' id='caja$i' name='caja$i'><br><br>";
        }
        ?>
        <input type="submit" value="Enviar">
    </form>
 


    
</body>
</html>