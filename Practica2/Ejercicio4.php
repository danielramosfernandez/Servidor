<?php 

$numeros= array(); 
for ($i = 0; $i < 4; $i++) {
    for ($j = 0; $j < 4; $j++) {
        $matriz[$i][$j] = rand(1, 100); 
    }
} 
echo "\nDiagonal principal:\n";
for ($i = 0; $i < 4; $i++) {
    echo $matriz[$i][$i] . " ";
}
echo "\n";


echo "\nDiagonal secundaria:\n";
for ($i = 0; $i < 4; $i++) {
    echo $matriz[$i][3 - $i] . " ";
}
echo "\n";

?>