

<!-- Es obligatorio empezar con esa linea de código -->

<?php 
$numero=5;
for($i=1;$i<=1;$i++){ 
    for($j=1;$j<=6;$j++){
        $M[$i][$j]=$numero; 
       

    } 
}

/* En los for de arriba marcamos la posicion q
queremos guardar */

echo $M[1][2]; 

echo("<br></br>"); /* Sirve para hacer salto de linea*/

/*En el echo lo q podremos ver es el 1 guardado*/

var_dump($M); 

/*En el var_dump lo q podremos ver es que el contenido
 del arrays es correcto*/

?>