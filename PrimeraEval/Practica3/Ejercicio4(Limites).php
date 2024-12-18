<?php 
function array_limitado($array,$limite){
    $array_limitado= []; 
    for($i=0; $i<count($array);$i++){ 
        if($i<$limite){ 
            $array_limitado[]= $array[$i]; 
        }else{ 
            break;
        }
    }
    return $array_limitado;
 }

 $array_o=[1, 2, 3, 4, 5, 6, 7, 8, 9, 10]; 
 $limite=5; 
 $array_limitado=array_limitado($array_o,$limite); 
print_r($array_limitado);
?>