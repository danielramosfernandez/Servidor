<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario con 9 cajas de texto</title>
</head>
<body>

    <!-- Esta parte es la misma q la tuya pero dentro de un HTML -->
    <form action="PruebaFormulario.php" method="post"> 
    <?php
    if ($_GET) { 
        for($i=0; $i<3; $i++){
            $valor = isset($_GET["caja$i"]) ? $_GET["caja$i"] : "No enviado";
            echo "Caja de texto $i: " . $valor . "<br>";
        }
    } else {
        echo "No se han enviado datos.";
    }
    ?>
        <input type="submit" value="Enviar">
    </form>
    <!-- El formulario acaba aquí -->


    
</body>
</html>