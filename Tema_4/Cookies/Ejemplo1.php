<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['color'])) { 
    $color = $_POST['color']; 
    setcookie('color_fondo', $color, time() + (30 * 24 * 60 * 60)); 

    // Recarga la página para aplicar el nuevo color
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html> 
<html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COOKIES</title> 
    </head>
    <body style="background-color: <?php echo isset($_COOKIE['color_fondo']) ? $_COOKIE['color_fondo']: 'white';?>;">
        <!-- La linea anteruir podria definirse como una iteración de if y else 
             -Siendo que si se cumple la condición de que la cookie tiene un color seleccionado 
              el fondo cambiará a ese color establecido. 
             -En el caso de que no se haya rellenado la cookie esta se mantendra BLANCA --> 
        <h1>Seleccione un color de color fondo</h1>
            <form method="POST" action="#">
            <label>
            <input type="radio" name="color" value="red" 
                <?php echo (isset($_COOKIE['color_fondo']) && $_COOKIE['color_fondo'] === 'red') ? 'checked' : ''; ?>>
            Rojo
        </label><br>
        <label>
            <input type="radio" name="color" value="green" 
                <?php echo (isset($_COOKIE['color_fondo']) && $_COOKIE['color_fondo'] === 'green') ? 'checked' : ''; ?>>
            Verde
        </label><br>
        <label>
            <input type="radio" name="color" value="blue" 
                <?php echo (isset($_COOKIE['color_fondo']) && $_COOKIE['color_fondo'] === 'blue') ? 'checked' : ''; ?>>
            Azul
        </label><br><br>
        <button type="submit">Guardar color</button>
            </form>
    <body>
        
    </body>
</html>