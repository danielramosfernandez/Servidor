<?php 
$cont=0; 
$media=0;
for($i=1;$i<=5;$i++){
$M[$i]=$i*10; 
$cont+=$M[$i];
    } 
$media=$cont/count($M);

echo "Resultado de la media= ";
echo $media; 
echo "<br>";
?> 

<!-- $numtotal=0;
$numeros= array(10,20,30,40,50);
for($j=0; $j<count(value:$numeros);j++){
} -->