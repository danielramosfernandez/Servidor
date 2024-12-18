<?php

echo $num1= rand(1,100), "<br>"; 
echo $num2= rand(1,100), "<br>"; 


if($num1>$num2){ 
    echo "El numero mayor es:  $num1 <br>"; 
    $may=$num1;
}
else{ 
    echo "El numero mayor es: $num2 <br>";
   $may=$num2; 
}
if($may%2==0){ 
    echo "$may  es par ";
}else{ 
    echo "$may  es impar";
}

?>