<?php 
define("JORNADA",40); 
define("PHORA",50); 
$horas=55; 
$dif= $horas- JORNADA; 
if($dif>8){ 
    $paga=8*PHORA*2+($dif-8)*PHORA*3; 
}
else{ 
    $paga=$dif*PHORA*2; 
}
echo "Horas trabajadas: $horas <br>";
echo "Horas extras son:  $dif <br>";
echo "La paga es: $paga <br>";

?>