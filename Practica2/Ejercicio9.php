<?php 
$total=0;
$num= array(); 
for($i=0;$i<20;$i++){ 
    for($j=0;$j<20;$j++){ 
        $num[$i][$j]=rand(1, 100); 
    }
}
echo "Matriz 20x20: \n"; 
for ($i=0;$i<20;$i++){ 
    for($j=0;$j<20;$j++){ 
        echo $num[$i][$j] . " ";
    }
    echo "\n";
}
echo "<br>";
echo "Suma de cada columna: \n"; 
for ($i=0;$i<20;$i++){ 
    for($j=0;$j<20;$j++){ 
        $total+= $num[$i][$j];
    } 
    echo "<br>";
    echo "La suma es total de cada columna es ", $total, "\n";
    echo "\n";
}

?>