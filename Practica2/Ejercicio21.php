<?php
$numeros=array(3, 2, 8, 123, 5, 1); 

sort($numeros); 
$numeros_asociativo = array();
foreach ($numeros as $numero) {
    $numeros_asociativo[$numero] = $numero; 
}

echo "<table border='1'>
        <tr>
            <th>Números</th>
        </tr>";

foreach ($numeros_asociativo as $valor) {
    echo "<tr>
            <td>$valor</td>
          </tr>";
}
echo "</table>";
?>


?>