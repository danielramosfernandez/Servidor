<?php 
$coches = array("marca"=>"Citroen","modelo"=>"Berlingo","matricula"=>"4242FTT","anio"=>"2004" ); 
//la matricula es cero para comprobar si está vacio con empty() 
$bastidor="124623154362"; 
//Este ejemplo (bastidor), nos servira hacer un ejemplo de tamaño de cadena
if (isset($coches["marca"])){ 
    echo "La marca ".$coches["marca"]. " esta definida en el array"; 
    /* Aqui podremos ver que la marca, en esta caso un Citroen, 
       está declarado en el array $coches */
}else{ 
    echo "La marca 'marca' no esta definida en el array"; 
    /* Y aqui vemos que no esta definido */
} 
/* Con el método isset comprobaremos si la marca está definida  */
echo "<br>";
echo "El bastidor tiene una cantidad de numeros igual a ". strlen($bastidor); 
//strlen sirve para ver el tamaño de la cadena 
echo "<br>";
echo "Dentro del array hay " .count($coches). " elementos"; 
//count sirve para ver la cantidad de elementos que hay en el array coches
echo "<br>";
echo "Los valores dentro del array son: ". implode (" ,", array_values($coches));

?>