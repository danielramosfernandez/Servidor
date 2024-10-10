<!-- Crea una función para resolver la ecuación de segundo grado. Esta función recibe
los coeficientes de la ecuación y devuelve un array con las soluciones. Si no hay
soluciones reales, devuelve FALSE.
 -->
<?php
function ecuacion_segundo_grado($a,$b,$c){

}

$supe=$b**2-4*$a*$c; 
 if ($supe<0){ 
   $result=false;
   echo"El resultado es ", $result; 
   return;  
}
 if($a==0){ 
    if($b==0){ 
        if($c==0){ 
            echo "Cualquier número sera una solución";
        }else 
       $result=false; 
       echo"El resultado es ", $result; 
       return;
    }else{ 
      
        $soluc=-$c/$b;
        echo "Una de las soluciones es igual a $soluc";
    }

 }else{ 
  
    if($supe==0){  
       
        $soluc=-$b/(2*$a); 
        echo "Solucion igual a $soluc"; 
    }else{ 
       
        $solucA= (-$b+sqrt($supe))/(2*$a);
        $solucB= (-$b-sqrt($supe))/(2*$a);
        echo "La primera solución es $solucA y la segunda es $solucB";
    }
 }


?>
