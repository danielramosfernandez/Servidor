<?php 

$princ=0;
$secun=0; 
$M= array (
    array(15,10,25,8),
    array(3,2,1,7), 
    array(19,25,10,8),
    array(9,15,25,13)
);



for($i=0;$i<4;$i++){  
    $princ+=$M[$i][$i];
    $secun+=$M[$i][3-$i];
 
}

/*  *for($j=0;$j<count($M);$j++){ 
       
       $secun+=$M[$j][3-$j];

El tres sirve para que sume en dirección contraria 

    }
*/
echo "La primera diagonal es= ";
echo $princ;
echo "<br>";
echo "La segunda diagonal es= "; 
echo $secun;

?>