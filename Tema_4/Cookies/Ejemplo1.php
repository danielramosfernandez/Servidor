<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['color'])) { //comprueba que hay valores
    $color = $_POST['color']; //le da valor al introducido
    setcookie('color_fondo', $color, time() + (30 * 24 * 60 * 60));//establece la 

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
            <form method="POST" action="#"><!-- Se utiliza método POST -->
            <label>
            <input type="radio" name="color" value="red" 
                <?php echo (isset($_COOKIE['color_fondo']) && $_COOKIE['color_fondo'] === 'red') ? 'checked' : ''; ?>>
            Rojo 
            <!-- Botón de radio rojo -->
        </label><br>
        <label>
            <input type="radio" name="color" value="green" 
                <?php echo (isset($_COOKIE['color_fondo']) && $_COOKIE['color_fondo'] === 'green') ? 'checked' : ''; ?>>
            Verde 
            <!-- Botón de radio verde -->
        </label><br>
        <label>
            <input type="radio" name="color" value="blue" 
                <?php echo (isset($_COOKIE['color_fondo']) && $_COOKIE['color_fondo'] === 'blue') ? 'checked' : ''; ?>>
            Azul
            <!-- Botón de radio azul -->
        </label><br><br>
        <button type="submit">Guardar color</button> 
        <!-- Botón para enviar la cookie -->
            </form>
    <body>
        
    </body>
</html>