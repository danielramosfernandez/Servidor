<?php 
$coches = array("marca"=>"Citroen","modelo"=>"Berlingo","matricula"=>"4242FTT","anio"=>"2004" ); 
//la matricula es cero para comprobar si está vacio con empty() 
$bastidor="124623154362";
if (isset($coches["marca"])){ 
    echo "La marca ".$coches["marca"]. " esta definida en el array"; 
}else{ 
    echo "La marca 'marca' no esta definida en el array";
} 
/* Con el método isset comprobaremos si la marca está definida  */
echo "<br>";
echo "El bastidor tiene una cantidad de numeros igual a ". strlen($bastidor); 
echo "<br>";
echo "Dentro del array hay " .count($coches). " elementos";
echo "<br>";
echo "Los valores dentro del array son: ". implode (" ,", array_values($coches));
?>