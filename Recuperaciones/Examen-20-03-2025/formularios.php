<?php
//^Iniciamos la SESSION
    session_start();
    if (!isset($_SESSION['rol']) || $_SESSION['rol'] !== "director") { 
    header("Location: inicio.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introducción en masa</title>
</head>
<body>
    <h1>Introducción en masa</h1>
    <!-- De nuevo recuperamos el nombre del usuario -->
    <h2>Hola <?php echo  $_SESSION['usu'];?></h2>
    <!-- Como el fomulario va a ser llevado a otra app la nombramos en la acción-->    
     <form method="post" action="grabado.php">
        <!-- Mostramos el formulario con un for que nos cuente el número  de veces que pulsamos INCREMENTAR -->
        <?php 
            for ($i=1;$i<=$_SESSION['contador']; $i++) {
                //&La i se trata del número de veces que pulsamos incrementar
                echo "<fieldset style='border: 4px double; display:inline;'><p>Nota$i</p>";
                echo<<<_END
                    <label for='alumno$i'>Alumno$i </label>
                    <input type='text' id='alumno$i' name='alumno$i' required>
                    <br>
                    <label for='asignatura$i'>Asignatura$i </label>
                    <input type='text' id='asignatura$i' name='asignatura$i' required>
                    <br>
                    <label for='nota$i'>Nota$i </label>
                    <input type='number' id='nota$i' name='nota$i' required></fieldset>
                _END;
            }
        ?>
        <br>
        <input type="submit" value="Grabar">
    </form>
</body>
</html>