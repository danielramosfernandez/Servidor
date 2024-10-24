<?php 
$matriz= array(); 
for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 5; $j++) {
        $matriz[$i][$j] = rand(1, 100); 
    }
}  
echo "Matriz 4x5:\n";
for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 5; $j++) {
        echo $matriz[$i][$j] . " ";
    }
    echo "\n";
}
echo "<br>";
$maxMatriz=$matriz[0][0]; 
$maxColumna=0;
$maxFila=0;
for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 5; $j++) {
        if($matriz[$i][$j] > $maxMatriz){
        $maxMatriz = $matriz[$i][$j];
        $maxFila=$i; 
        $maxColumna=$j;
       } 
    }
}

echo"El valor máximo es ($maxMatriz) en la fila $maxFila y la columna $maxColumna. ";
?>