<?php 
echo "---EJERCICIO 2---"; 
echo "<br>";
$nivel=array("Basico", "Medio", "Perfeccionamiento"); 
$idioma=array("Ingles","Francés","Alemán", "Ruso");
$alumnos=array(
    array(1,14,8,3), 
    array(6,19,7,2), 
    array(3,13,4,1)
);

for($nivel=0;$nivel<3;$nivel++){  
    echo "Nivel ". $nivel. "<br>"; 
    for($idioma=0;$idioma<4;$idioma++){ 
        echo "Idioma $idioma: " . $alumnos[$nivel][$idioma]."<br>";
    } 
    echo "<br>";
}

?>