<?php
//^ Iniciamos la sesión
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <h1>Agenda</h1>
    <!-- De nuevo recuperamos el nombre del usuario -->
    <h2>Hola <?php echo htmlspecialchars($_SESSION['usu'] ?? 'Usuario'); ?></h2>
    <!-- Como el formulario va a ser llevado a otra app la nombramos en la acción-->    
     <form method="post" action="grabado.php">
        <!-- Mostramos el formulario con un for que nos cuente el número de veces que pulsamos INCREMENTAR -->
        <?php 
            for ($i = 1; $i <= ($_SESSION['contador'] ?? 0) + 1; $i++) {
                //& La i se trata del número de veces que pulsamos incrementar
                echo "<fieldset style='border: 4px double; display:inline;'><p>CONTACTO $i</p>";
                echo "<label for='nombre$i'>Nombre $i </label>";
                echo "<input type='text' id='nombre$i' name='nombre$i' required>";
                echo "<br>";
                echo "<label for='email$i'>Email $i </label>";
                echo "<input type='email' id='email$i' name='email$i' required>";
                echo "<br>";
                echo "<label for='telefono$i'>Telefono $i </label>";
                echo "<input type='tel' id='telefono$i' name='telefono$i' required></fieldset>";
            }
        ?>
        <br>
        <input type="submit" value="Grabar">
    </form>
</body>
</html>
