<?php

$lenguajes= array(
    $lenguajes_cliente=array( 
        'HT'=>'HTML', 
        'JS'=>'JavaScript', 
        'AN'=>'Angular', 
        'SW'=>'Swift'
    ),
    $lenguajes_servidord=array( 
        'PY'=>'Python', 
        'ND'=>'NodeJS', 
        'RB'=>'Ruby', 
        'PR'=>'Perl'
    )
    );
    echo "<table border='1'>";
    echo "<tr><th>Código</th><th>Lenguaje</th><th>Tipo</th></tr>";
foreach($lenguajes as $tipo =>$lenguajes_array){ 
    foreach($lenguajes_array as $codigo=>$nombre){ 
        echo "<tr>
        <td>$codigo</td>
        <td>$nombre</td>
        <td>$tipo</td>
      </tr>";
    }
}
echo "</table>";
?>