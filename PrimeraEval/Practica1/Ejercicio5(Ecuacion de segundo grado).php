<!-- 
Crear un programa partir de 3 valores, a b y c que corresponden a los tres
coeficientes de una ecuación de segundo grado muestre las soluciones de la
misma La solución de la ecuación de segundo grado depende del signo de b2-4ac:
- si b2-4ac es negativo no hay soluciones
- si es nulo, hay sólo una solución -b/2a
- si es positivo, hay dos soluciones: (-b+sqrt(b2-4ac))/(2a) y (-bsqrt(b2-4ac))/(2a) 
-->
<?php

$a=10; //se corresponde al primer valor
$b=-2; //se corresponde al segundo valor 
$c=-12; //se corresponde al segundo valor

$supe=$b**2-4*$a*$c; /* Esta linea calcula
la parte superior de la ecuacion que esta dentro de la raiz cuadrada 
que se calcular al final (si se cumplen ciertos parametros)
 */

 if ($supe<0){ 
    //Si la parte de dentro de la raiz es negativa no se podra realizar 
    //Por tanto obtendremos que no hay soluciones reales
    echo"No se pueden hacer raices negativas por tanto no hay soluciones reales"; 
    return;
}

 //Se utilizan IFs anidados
 if($a==0){ 
    if($b==0){ 
        if($c==0){ 
            //si la variable c es igual a 0
            echo "Cualquier número sera una solución";
        }else 
        //si c es distinto a cero la ecuación no puede tener solución
        echo "No habra solucion"; 
    }else{ 
        //en el caso de q b sea distinto a 0
        $soluc=-$c/$b;
        echo "Una de las soluciones es igual a $soluc";
    }

 }else{ 
    //en el caso de que sea distinto de 0
    if($supe==0){  
        //si se diese el caso de que toda la parte da la ecuacion diera 0
        $soluc=-$b/(2*$a); 
        echo "Solucion igual a $soluc"; 
    }else{ 
        //si la parte superior no da cero
        $solucA= (-$b+sqrt($supe))/(2*$a);//Utilizo A para identificar el primer resultado
        $solucB= (-$b-sqrt($supe))/(2*$a);//Se usa B para identificar la segunda solucion
        echo "La primera solución es $solucA y la segunda es $solucB";
    }
 }


?>
