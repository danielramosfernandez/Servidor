<?php
session_start();

// Inicializar colores de los círculos en la sesión si no están definidos
if (!isset($_SESSION["colores"])) {
    $_SESSION["colores"] = ["black", "black", "black", "black"];
}

// Actualizar el color del círculo correspondiente si se ha enviado un nuevo color
if (isset($_POST["color"]) && isset($_POST["circulo"])) {
    $circulo = $_POST["circulo"];
    $color = $_POST["color"];
    $_SESSION["colores"][$circulo] = $color;
}

// Obtener los colores de los círculos desde la sesión
$colores = $_SESSION["colores"];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Círculos de Colores</title>
    <style>
        body { 
            text-align: center;
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

<!-- Mostrar los círculos con colores almacenados en la sesión -->
<div class="circulo" style="background-color: <?php echo $colores[0]; ?>;"></div>
<div class="circulo" style="background-color: <?php echo $colores[1]; ?>;"></div>
<div class="circulo" style="background-color: <?php echo $colores[2]; ?>;"></div>
<div class="circulo" style="background-color: <?php echo $colores[3]; ?>;"></div>

<!-- Formulario para cambiar el color de cada círculo -->
<form action="#" method="post">
    <label>Selecciona el círculo:</label>
    <select name="circulo">
        <option value="0">Círculo 1</option>
        <option value="1">Círculo 2</option>
        <option value="2">Círculo 3</option>
        <option value="3">Círculo 4</option>
    </select>
    <br>
    <label>Selecciona el color:</label>
    <button type="submit" name="color" value="red">Rojo</button>
    <button type="submit" name="color" value="green">Verde</button>
    <button type="submit" name="color" value="blue">Azul</button>
    <button type="submit" name="color" value="yellow">Amarillo</button>
</form>

<!-- Formulario para enviar los colores seleccionados a otro archivo PHP -->
<form action="comprobar.php" method="post">
    <input type="hidden" name="resColor" value="<?php echo implode(",", $colores); ?>">
    <input type="submit" value="Enviar" name="submit">
</form>

</body>
</html>
