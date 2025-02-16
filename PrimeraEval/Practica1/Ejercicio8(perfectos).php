<?php 

$num=rand(1,1000); 
$suma=1; 
for($i=1;$i<=$num;$i++){ 
    if($num%$i==0){ 
        $suma +=$i; 
    }
}
if ($sum == $num && $num != 1) { 
    echo "El numero $num es perfecto"; 
}else{ 
    echo "EL NUMERO $num no es perfecto";
}
?>