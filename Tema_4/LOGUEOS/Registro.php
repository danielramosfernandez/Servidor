
//REGISTRO
<!DOCTYPE html> 
<html lang="es">
    <head>
        <meta charset="UTF-8"> 
        <title>SUMA DE DOS NUMEROS</title>
    </head>
    <body>
        <h2>REGISTRO </h2>

        <form method = "post" action="Ejemplo1.php"> 
            Nombre: <input type ="text" name="usu" required><br></br> 
            Contraseña: <input type ="text" name="pass" required><br></br>  
            Confirmar contraseña: <input type ="text" name="conf" required><br></br>   
            Rol:<br></br>   
            Estandar <input type="radio" name="rol" value="estandar"><br></br>   
            Premium<input type="radio" name="rol" value="premium"><br></br>   
            <input type="submit" value="REGISTRARSE">
        </form>  
        </body>   

<?php

?>