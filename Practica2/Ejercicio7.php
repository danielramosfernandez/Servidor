<?php 

$numeros= array(); 
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 4; $j++) {
        $numeros[$i][$j] = rand(1, 100); 
    }
} 

echo "Matriz 3x4:\n";
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 4; $j++) {
        echo $numeros[$i][$j] . " ";
    }
    echo "\n";
}
echo "<br>"; 
$mayoresPorFila = [];


foreach ($numeros as $indiceFila => $fila) {
    $mayor = max($fila);
    $mayoresPorFila[$indiceFila] = $mayor; 
    $suma = array_sum($fila); 
    $promedio = $suma / count($fila);
    $mayoresPorFila[$indiceFila] = $mayor; 
    $promediosPorFila[$indiceFila] = $promedio;  
}


echo "Mayor de cada fila:\n";
foreach ($mayoresPorFila as $indiceFila => $mayor) {
    echo "<br> Fila $indiceFila: $mayor ";
} 
echo "<br>"; 
echo "Promedio de cada fila:\n";
foreach ($promediosPorFila as $indiceFila => $promedio) {
    echo "<br> Fila $indiceFila: $promedio\n";
}

?>