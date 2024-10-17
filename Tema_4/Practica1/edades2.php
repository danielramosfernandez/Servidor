<?php
$mensaje='';
if($_SERVER['REQUEST_METHOD'] =='POST'){ //comprueba si el formulario fue enviado
    if (isset($_POST['boton'])){ //comprueba si los números fueron introducidos
        $boton =$_POST['boton']; 

        switch($boton){ 
            case 'Menos de 14 años': 
                $mensaje = "eres una personita"; 
                break; 
            case "Entre 15 y 20 años": 
                $mensaje =  "todavía eres muy joven"; 
                break; 
            case "De 21 a 40 años": 
                 $mensaje = "eres una persona joven"; 
                break; 
            case "Entre 41 y 60 años"; 
                 $mensaje = "eres una persona madura"; 
                break; 
            case "Más de 60 años": 
                $mensaje =  "Ya eres una persona mayor"; 
                break; 
            
        }
    }else {
       
        $mensaje = "Aún no me has dicho la edad"; 
    }
}
?>
<!DOCTYPE html> 
<html lang="es">
    <head>
        <meta charset="UTF-8"> 
        <title>DIME TU EDAD</title>
    </head>
    <body>
        <h2>Introduzca los numeros que quiere sumar: </h2>

        <form method = "post" action="#"> 
        <label>
            <input type="radio" name="boton" value="Menos de 14 años"> Menos de 14 años
        </label><br>
        <label>
            <input type="radio" name="boton" value="Entre 15 y 20 años"> Entre 15 y 20 años
        </label><br>
        <label>
            <input type="radio" name="boton" value="De 21 a 40 años"> De 21 a 40 años
        </label><br>
        <label>
            <input type="radio" name="boton" value="Entre 41 y 60 años"> Entre 41 y 60 años
        </label><br>
        <label>
            <input type="radio" name="boton" value="Más de 60 años"> Más de 60 años
        </label><br><br>
            <input type="submit" value="resultado">
        </form>  
        <?php
        if(isset($mensaje)){
            echo "<h2>$mensaje</h2>";
        }
        ?>  
        </body>