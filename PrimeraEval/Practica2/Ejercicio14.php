<?php

$ciudades=array( 
    'MD'=>'Madrid', 
    'BC'=>'Barcelona', 
    'LD'=>'Londres',
    'NY'=>'New York', 
    'LA'=>'Los Angeles', 
    'CH'=>'Chicago'
); 
foreach($ciudades as $nombre =>$indice ){ 
    echo "El índice del array que contiene como valor ".$nombre." es ". $indice. "<br>"; 
}

?>