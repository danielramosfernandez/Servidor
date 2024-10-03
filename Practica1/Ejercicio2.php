<?php 

$num1=3;
$num2=6; 
$num3=15; 

if(($num1>$num2)&($num1>$num3)){ 
echo "El mayor es ". $num1; 
}
elseif(($num2>$num1)&($num2>$num3)){ 
echo "El mayor es ". $num2;
}
else{ 
echo "El mayor es ". $num3;
}

?>