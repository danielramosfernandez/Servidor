<?php 

$numeros= array(); 
for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
        $numeros[$i][$j] = rand(1, 100); 
    }
} 
echo "Matriz 10x10:\n";
for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
        echo $numeros[$i][$j] . " ";
    }
    echo "\n";
}
echo "<br>"; 
$maxValor = $numeros[0][0];
$maxFila = 0;
$maxColumna = 0;
for ($i = 0; $i < 10; $i++) {
    for ($j = 0; $j < 10; $j++) {
        if ($numeros[$i][$j] > $maxValor) {
            $maxValor = $numeros[$i][$j];
            $maxFila = $i;
            $maxColumna = $j;
        }
    }
}
    echo "El valor máximo es $maxValor en la posición [fila: $maxFila, columna: $maxColumna].\n";
?>