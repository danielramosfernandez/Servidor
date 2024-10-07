<?php 

$numeros= array(); 
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 5; $j++) {
        $matriz[$i][$j] = rand(1, 100); 
    }
} 

echo "Elementos por fila:\n";
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 5; $j++) {
        echo $matriz[$i][$j] . " ";
    }
}
echo "\n";
echo "<br>";

echo "Elementos por columna:\n";
for ($j = 0; $j < 5; $j++) {
    for ($i = 0; $i < 3; $i++) {
        echo $matriz[$i][$j] . " ";
    }
}
echo "\n";
?>