<?php

if($_SERVER['REQUEST_METHOD'] =='POST'){ //comprueba si el formulario fue enviado
    if (isset($_POST['num1'])&& isset($_POST['num2'])){ //comprueba si los números fueron introducidos
        $num1=(float)$_POST['num1']; 
        $num2=(float)$_POST['num2'];
        /* Estas líneas transforman num1 y num2 de 
            float que es como son introducidos 
            a números */
            
        $resultado=$num1+$num2; 
    }
}
?>
<!DOCTYPE html> 
<html lang="es">
    <head>
        <meta charset="UTF-8"> 
        <title>SUMA DE DOS NUMEROS</title>
    </head>
    <body>
        <h2>Introduzca los numeros que quiere sumar: </h2>

        <form method = "post" action="Sumas1.php"> 
            Número 1: <input type ="text" name="num1" required><br></br> 
            Número 2: <input type ="text" name="num2" required><br></br> 
            <input type="submit" value="Sumar">
        </form>  
        <?php
        if(isset($resultado)){
            echo "<h2>Resultado es </h2>"; 
            echo "<p>$num1 + $num2 =: $resultado</p>";
        }
        ?>  
        </body>