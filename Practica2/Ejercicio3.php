<?php 
$pares= array(); 

for($i=2;$i<=20;$i+=2){ 
    $pares[]=$i;
   
}
foreach($pares as $numero){ 
    echo $numero . "\n";
    echo "<br>";
}

?>